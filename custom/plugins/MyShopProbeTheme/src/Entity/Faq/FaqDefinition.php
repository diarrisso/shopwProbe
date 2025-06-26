<?php

declare(strict_types=1);
namespace MyShopProbeTheme\Entity\Faq;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\CreatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\UpdatedAtField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use MyShopProbeTheme\Entity\Faq\FaqCollection;
use MyShopProbeTheme\Entity\Faq\FaqEntity;

class FaqDefinition extends EntityDefinition
{

    public const ENTITY_NAME = 'myshopprobe_faq';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }


    public function getCollectionClass(): string
    {
        return FaqCollection::class;
    }

    public function getEntityClass(): string
    {
        return FaqEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            (new StringField('question', 'question'))->addFlags(new Required()),
            (new LongTextField('answer', 'answer'))->addFlags(new Required()),
            new BoolField('active', 'active'),
            new CreatedAtField(),
            new UpdatedAtField(),
        ]);

    }
}
