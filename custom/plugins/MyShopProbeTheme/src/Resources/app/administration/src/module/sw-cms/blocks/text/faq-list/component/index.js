import template from './sw-cms-block-faq-list.html.twig';
import './sw-cms-block-faq-list.scss';

const { Component } = Shopware;

/**
 * @private
 */
Component.register('sw-cms-block-faq-list', {
    template,

    computed: {
        currentDeviceView() {
            return this.cmsPageState.currentCmsDeviceView;
        }
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('faq');
        },
        initElementConfig(faq) {

        }
    }
});