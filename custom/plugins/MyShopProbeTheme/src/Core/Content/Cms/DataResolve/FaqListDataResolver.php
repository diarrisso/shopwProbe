<?php

namespace MyShopProbeTheme\Core\Content\Cms\DataResolver;

use MyShopProbeTheme\Core\Content\Cms\SalesChannel\Struct\FaqListStruct;
use Shopware\Core\Content\Cms\Aggregate\CmsSlot\CmsSlotEntity;
use Shopware\Core\Content\Cms\DataResolver\CriteriaCollection;
use Shopware\Core\Content\Cms\DataResolver\Element\AbstractCmsElementResolver;
use Shopware\Core\Content\Cms\DataResolver\ResolverContext\ResolverContext;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Sorting\FieldSorting;


class FaqListDataResolver extends AbstractCmsElementResolver
{

    private EntityRepository $faqRepository;

    public function __construct(EntityRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function getType(): string
    {
        return 'faq-list';
    }

    public function collect(CmsSlotEntity $slot, ResolverContext $resolverContext): CriteriaCollection
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('active', true));
        $criteria->addSorting(new FieldSorting('createdAt', 'DESC'));

        return new CriteriaCollection($this->faqRepository, $criteria);
    }

    public function enrich(CmsSlotEntity $slot, ResolverContext $resolverContext, \Shopware\Core\Content\Cms\DataResolver\Element\ElementDataCollection $result): void
    {
        $faqs = $result->get('faq_list');

        $faqListStruct = new FaqListStruct();
        $faqListStruct->setFaqs($faqs);

        $slot->setData($faqListStruct);
    }


    public function supports(CmsSlotEntity $slot): bool
    {
        return $slot->getType() === $this->getType();
    }
}
