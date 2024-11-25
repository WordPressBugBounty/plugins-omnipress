import { getContext, getElement, store } from '@wordpress/interactivity';

store(
    'omnipress/content-switcher',
    {
        actions: {
            init: () => {
                const context = getContext();
            },
        },
        callbacks: {
            initSwitcherSwitch: () => {
                const context = getContext();
                const element = getElement().ref;

                context.switchRef = element;

                context.activeStyles = 'display:block;';
            },
            onToggleSwitch: (e, value) => {
                const context = getContext();
                const element = getElement().ref;

                if (value) {
                    context.activeTarget = value;
                }

                context.activeTarget =
                    'switch-1' === context.activeTarget ? 'switch-2' : 'switch-1';

                if (context.activeTarget === 'switch-1') {
                    element.classList.remove('active');
                } else {
                    element.classList.add('active');
                }
            },
            activateLeftContent: () => {
                const context = getContext();

                if (context.toggleRef) {
                    context.toggleRef.classList.remove('active-switcher');
                }

                context.activeTarget = 'switch-1';
            },
            activateRightContent: () => {
                const context = getContext();
                context.activeTarget = 'switch-2';

                if (context.toggleRef) context.toggleRef.classList.add('active-switcher');
            },
            watchStyles: () => {
                const context = getContext();

                if (context.switchRef) {
                    const switchButtonLabels = context.switchRef.querySelectorAll('.switch-label');

                    switchButtonLabels.forEach((label, i) => {
                        if (context.activeTarget === `switch-${i + 1}`) {
                            label.classList.add('active');
                        } else {
                            label.classList.remove('active');
                        }
                    });
                }

                const style = `.op-${context.uniqueId} #${context.activeTarget}{${context.activeStyles}}`;

                context.style = style;
            },
            initSwitcher: () => {
                const context = getContext();
                const element = getElement().ref;

                context.toggleRef = element;
            },
        },
    },
    {
        lock: true,
    }
);
