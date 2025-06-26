import './component';
import './preview';

const { Shopware } = window;

/**
 * @private
 */
Shopware.Component.register('sw-cms-block-faq-list', () => import('./component'));
Shopware.Component.register('sw-cms-block-faq-list-preview', () => import('./preview'));

Shopware.Service('cmsService').registerCmsBlock({
    name: 'faq-list',
    label: 'FAQ List Block',
    category: 'text',
    component: 'sw-cms-block-faq-list',
    previewComponent: 'sw-cms-block-faq-list-preview',
    defaultConfig: {
        marginTop: {
            source: 'static',
            value: '0px',
        },
        marginBottom: {
            source: 'static',
            value: '0px',
        },
        backgroundColor: {
            source: 'static',
            value: '#000000',
        }
    },
    slots: {
        faq: {
            type: 'faq-list'
        }
    }
});