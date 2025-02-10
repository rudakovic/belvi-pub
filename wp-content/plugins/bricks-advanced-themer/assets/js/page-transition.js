(function() {
    // Handle link clicks
    document.addEventListener('click', (e) => {
        const target = e.target.closest('a');
        
        if (target) {
            const selectedWrapper = e.target.closest('[data-page-transition-wrapper="true"]');
            if (selectedWrapper) {
                const allWrappers = Array.from(document.querySelectorAll('[data-page-transition-wrapper="true"]'));
                const index = allWrappers ? allWrappers.indexOf(selectedWrapper) : -1;
                sessionStorage.setItem('activeTransitionElement', index);
                allWrappers[index].setAttribute('data-page-transition-selected', 'true');
            }
            
        }
    });

    // Handle forward transitions
    window.addEventListener('pageswap', async (e) => {
        if (e.viewTransition) {
            const activeWrapper = document.querySelector('[data-page-transition-selected=true]');
            console.log(activeWrapper);
            if (activeWrapper) {
                const items = activeWrapper.querySelectorAll('[data-page-transition-name]');
                items.forEach(el => {
                    const transitionName = el.getAttribute('data-page-transition-name') || el.parentElement.getAttribute('data-page-transition-name');
                    if (transitionName) {
                        document.querySelectorAll(`[data-page-transition-name=${transitionName}]`).forEach(el => el.style.viewTransitionName = 'none');
                        el.style.viewTransitionName = transitionName;
                    }
                });
            }
        }
    });

    // Handle reverse transitions
    window.addEventListener('pagereveal', async (e) => {
        if (e.viewTransition) {
            const activeIndex = sessionStorage.getItem('activeTransitionElement');
            if (activeIndex !== null) {
                const activeWrapper = Array.from(document.querySelectorAll('[data-page-transition-wrapper="true"]'))[activeIndex];
                if (activeWrapper) {
                    const items = activeWrapper.querySelectorAll('[data-page-transition-name]');
                    items.forEach(el => {
                        const transitionName = el.getAttribute('data-page-transition-name') || el.parentElement.getAttribute('data-page-transition-name');
                        if (transitionName) {
                            el.style.viewTransitionName = transitionName;
                        }
                    });
                }
            }
        }
    });

})()
