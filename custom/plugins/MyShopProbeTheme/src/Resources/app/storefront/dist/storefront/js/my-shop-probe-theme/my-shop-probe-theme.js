import Plugin from 'src/plugin-system/plugin.class';

export default class FaqPlugin extends Plugin {
    static options = {
        faqToggleSelector: '[data-faq-toggle]',
        faqContentSelector: '[data-faq-content]',
        faqToggleIconSelector: '.faq-toggle',
        openClass: 'open'
    };

    init() {
        this.registerEvents();
    }

    registerEvents() {
        const faqToggles = document.querySelectorAll(this.options.faqToggleSelector);

        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', this.onToggleClick.bind(this));
        });
    }

    onToggleClick(event) {
        const toggle = event.currentTarget;
        const index = toggle.getAttribute('data-faq-toggle');
        const content = document.querySelector(`[data-faq-content="${index}"]`);
        const icon = toggle.querySelector(this.options.faqToggleIconSelector);

        if (content && icon) {
            if (content.classList.contains(this.options.openClass)) {
                content.classList.remove(this.options.openClass);
                icon.classList.remove(this.options.openClass);
                content.style.display = 'none';
            } else {
                content.classList.add(this.options.openClass);
                icon.classList.add(this.options.openClass);
                content.style.display = 'block';
            }
        }
    }
}

window.PluginManager.register('FaqPlugin', FaqPlugin, '.cms-element-faq-list');
