<?php declare(strict_types=1);
/*
 * (c) shopware AG <info@shopware.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swag\PayPal\Checkout\ExpressCheckout\Service;

use Shopware\Core\Checkout\Cart\SalesChannel\CartService;
use Shopware\Core\Checkout\Customer\CustomerEntity;
use Shopware\Core\Framework\Event\ShopwareSalesChannelEvent;
use Shopware\Core\Framework\Log\Package;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Swag\PayPal\Checkout\Cart\Service\CartPriceService;
use Swag\PayPal\Checkout\ExpressCheckout\ExpressCheckoutButtonData;
use Swag\PayPal\Checkout\Payment\PayPalPaymentHandler;
use Swag\PayPal\Setting\Service\CredentialsUtilInterface;
use Swag\PayPal\Setting\Settings;
use Swag\PayPal\Storefront\Data\Service\AbstractScriptDataService;
use Swag\PayPal\Util\Availability\AvailabilityContext;
use Swag\PayPal\Util\Availability\AvailabilityContextBuilder;
use Swag\PayPal\Util\Lifecycle\Method\PayLaterMethodData;
use Swag\PayPal\Util\LocaleCodeProvider;
use Swag\PayPal\Util\PaymentMethodUtil;
use Symfony\Component\Routing\RouterInterface;

#[Package('checkout')]
class PayPalExpressCheckoutDataService extends AbstractScriptDataService
{
    /**
     * @internal
     */
    public function __construct(
        private readonly CartService $cartService,
        LocaleCodeProvider $localeCodeProvider,
        private readonly RouterInterface $router,
        private readonly PaymentMethodUtil $paymentMethodUtil,
        SystemConfigService $systemConfigService,
        CredentialsUtilInterface $credentialsUtil,
        private readonly CartPriceService $cartPriceService,
        private readonly PayLaterMethodData $payLaterMethodData,
    ) {
        parent::__construct($localeCodeProvider, $systemConfigService, $credentialsUtil);
    }

    public function buildExpressCheckoutButtonData(
        SalesChannelContext $salesChannelContext,
        bool $addProductToCart = false,
        ?ShopwareSalesChannelEvent $event = null
    ): ?ExpressCheckoutButtonData {
        $cart = $this->cartService->getCart($salesChannelContext->getToken(), $salesChannelContext);

        if (!$addProductToCart && $cart->getLineItems()->count() === 0) {
            return null;
        }

        if (!$addProductToCart && $this->cartPriceService->isZeroValueCart($cart)) {
            return null;
        }

        $customer = $salesChannelContext->getCustomer();
        if ($customer instanceof CustomerEntity && $customer->getActive()) {
            return null;
        }

        $context = $salesChannelContext->getContext();
        $salesChannelId = $salesChannelContext->getSalesChannelId();

        $fundingSources = ['paypal', 'venmo'];

        $availabilityContext = null;
        if ($addProductToCart && $event instanceof ProductPageLoadedEvent) {
            $availabilityContext = AvailabilityContextBuilder::buildFromProduct(
                $event->getPage()->getProduct(),
                $salesChannelContext
            );
        } elseif (!$addProductToCart) {
            $availabilityContext = AvailabilityContextBuilder::buildFromCart($cart, $salesChannelContext);
        }

        if ($this->showPayLater($salesChannelId, $availabilityContext)) {
            array_splice($fundingSources, 1, 0, ['paylater']);
        }

        return (new ExpressCheckoutButtonData())->assign([
            ...parent::getBaseData($salesChannelContext),
            'productDetailEnabled' => $this->systemConfigService->getBool(Settings::ECS_DETAIL_ENABLED, $salesChannelId),
            'offCanvasEnabled' => $this->systemConfigService->getBool(Settings::ECS_OFF_CANVAS_ENABLED, $salesChannelId),
            'loginEnabled' => $this->systemConfigService->getBool(Settings::ECS_LOGIN_ENABLED, $salesChannelId),
            'cartEnabled' => $this->systemConfigService->getBool(Settings::ECS_CART_ENABLED, $salesChannelId),
            'listingEnabled' => $this->systemConfigService->getBool(Settings::ECS_LISTING_ENABLED, $salesChannelId),
            'buttonColor' => $this->systemConfigService->getString(Settings::ECS_BUTTON_COLOR, $salesChannelId),
            'buttonShape' => $this->systemConfigService->getString(Settings::ECS_BUTTON_SHAPE, $salesChannelId),
            'addProductToCart' => $addProductToCart,
            'contextSwitchUrl' => $this->router->generate('frontend.paypal.express.prepare_cart'),
            'payPalPaymentMethodId' => $this->paymentMethodUtil->getPayPalPaymentMethodId($context),
            'createOrderUrl' => $this->router->generate('frontend.paypal.express.create_order'),
            'prepareCheckoutUrl' => $this->router->generate('frontend.paypal.express.prepare_checkout'),
            'checkoutConfirmUrl' => $this->router->generate(
                'frontend.checkout.confirm.page',
                [PayPalPaymentHandler::PAYPAL_EXPRESS_CHECKOUT_ID => true],
                RouterInterface::ABSOLUTE_URL
            ),
            'handleErrorUrl' => $this->router->generate('frontend.paypal.handle-error'),
            'cancelRedirectUrl' => $this->router->generate($addProductToCart ? 'frontend.checkout.cart.page' : 'frontend.checkout.register.page'),
            'showPayLater' => $this->showPayLater($salesChannelId, $availabilityContext),
            'fundingSources' => $fundingSources,
        ]);
    }

    protected function getButtonLanguageSetting(): string
    {
        return Settings::ECS_BUTTON_LANGUAGE_ISO;
    }

    private function showPayLater(string $salesChannelId, ?AvailabilityContext $availabilityContext): bool
    {
        return $availabilityContext !== null
            && $this->systemConfigService->getBool(Settings::ECS_SHOW_PAY_LATER, $salesChannelId)
            && $this->payLaterMethodData->isAvailable($availabilityContext);
    }
}
