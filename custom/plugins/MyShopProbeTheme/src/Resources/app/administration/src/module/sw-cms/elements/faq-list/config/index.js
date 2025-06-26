import template from './sw-cms-el-config-faq-list.html.twig';

const { Mixin } = Shopware;

/**
 * @private
 */
export default {
    template,

    mixins: [
        Mixin.getByName('cms-element'),
    ],

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('faq-list');
        },

        onInput(value) {
            this.element.config.title.value = value;
            this.$emit('element-update', this.element);
        },

        onChangeMaxItems(value) {
            this.element.config.maxItems.value = value;
            this.$emit('element-update', this.element);
        },
    },
};