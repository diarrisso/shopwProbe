import template from './component/sw-cms-el-faq-list.html.twig';
import './component/sw-cms-el-faq-list.scss';

/**
 * @private
 */
Shopware.Component.register('sw-cms-el-preview-faq-list', () => import('./preview'));
Shopware.Component.register('sw-cms-el-config-faq-list', () => import('./config'));
Shopware.Component.register('sw-cms-el-faq-list', () => import('./component'));

Shopware.Service('cmsService').registerCmsElement({
    name: 'faq-list',
    label: 'FAQ Liste',
    component: 'sw-cms-el-faq-list',
    configComponent: 'sw-cms-el-config-faq-list',
    previewComponent: 'sw-cms-el-preview-faq-list',
    defaultConfig: {
        title: {
            source: 'static',
            value: 'Häufig gestellte Fragen',
        },
        maxItems: {
            source: 'static',
            value: 10,
        },
    },
});