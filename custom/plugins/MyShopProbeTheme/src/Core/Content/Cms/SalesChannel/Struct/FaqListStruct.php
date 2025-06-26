<?php
declare(strict_types=1);

namespace MyShopProbeTheme\Core\Content\Cms\SalesChannel\Struct;

use MyShopProbeTheme\Entity\Faq\FaqCollection;
use Shopware\Core\Framework\Struct\Struct;

class FaqListStruct extends Struct
{
    protected FaqCollection $faqs;

    public function getFaqs(): FaqCollection
    {
        return $this->faqs;
    }

    public function setFaqs(FaqCollection $faqs): void
    {
        $this->faqs = $faqs;
    }
}