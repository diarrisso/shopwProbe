import template from './sw-cms-el-faq-list.html.twig';
import './sw-cms-el-faq-list.scss';

const { Mixin } = Shopware;

/**
 * @private
 */
export default {
    template,

    mixins: [
        Mixin.getByName('cms-element'),
    ],

    data() {
        return {
            faqs: [
                {
                    question: 'Was ist Masinga Tech?',
                    answer: 'Masinga Tech ist ein Unternehmen, das sich auf innovative digitale Lösungen zur Unterstützung Ihrer digitalen Transformation spezialisiert hat.',
                },
                {
                    question: 'Welche Dienstleistungen bieten Sie an?',
                    answer: 'Wir bieten Webentwicklung, mobile Apps, Beratung zur digitalen Transformation und Cloud-Hosting an.',
                },
                {
                    question: 'Wie kann man Sie kontaktieren?',
                    answer: 'Sie können uns über das Kontaktformular auf der Website oder per E-Mail an contact@masingatech.com erreichen.',
                },
            ],
        };
    },

    computed: {
        title() {
            return this.element.config.title.value;
        },

        maxItems() {
            return this.element.config.maxItems.value;
        },

        displayedFaqs() {
            return this.faqs.slice(0, this.maxItems);
        },
    },

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('faq-list');
        },
    },
};