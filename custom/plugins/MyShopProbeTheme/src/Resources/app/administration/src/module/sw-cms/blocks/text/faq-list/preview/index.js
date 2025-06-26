import template from './sw-cms-preview-faq-list.html.twig';
import './sw-cms-preview-faq-list.scss';

/**
 * @private
 */
export default {
    name: 'sw-cms-preview-faq-list',
    template,

    data() {
        return {
            demoFaqs: [
                {
                    question: 'Was ist Masinga Tech?',
                    answer: 'Masinga Tech ist ein Unternehmen...',
                },
                {
                    question: 'Welche Dienstleistungen bieten Sie an?',
                    answer: 'Wir bieten Webentwicklung, mobile Apps...',
                },
            ],
        };
    },
};