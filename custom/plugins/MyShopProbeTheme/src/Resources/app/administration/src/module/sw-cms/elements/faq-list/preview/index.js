import template from './sw-cms-el-preview-faq-list.html.twig';
import './sw-cms-el-preview-faq-list.scss';

/**
 * @private
 */
export default {
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