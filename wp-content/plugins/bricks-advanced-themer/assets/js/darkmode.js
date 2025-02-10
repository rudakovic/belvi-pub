window.addEventListener('DOMContentLoaded', () => {
    const toggles = document.querySelectorAll('.brxe-brxc-darkmode-toggle, .brxe-brxc-darkmode-btn, .brxe-brxc-darkmode-btn-nestable, .brxe-brxc-darkmode-toggle-nestable');
    if (toggles.length < 1) return;
    const html = document.documentElement;
    let darkmodeCookie = localStorage.getItem("brxc-theme");

    toggles.forEach(toggle => {
        const checkbox = toggle.querySelector('input.brxc-toggle-checkbox, .brxc-darkmode-btn-nestable__checkbox, .brxc-darkmode-toggle-nestable__checkbox')
        if(!checkbox) return;

        if(darkmodeCookie === 'dark' || (!darkmodeCookie && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            checkbox.checked = true;
        }

        //setTimeout(toggle.classList.remove('no-animation'), 3000);

        checkbox.addEventListener('change', () => {
            if(html.dataset.theme === 'dark') {
                html.setAttribute('data-theme','light');
                toggles.forEach(cb => {cb.querySelector('input.brxc-toggle-checkbox, .brxc-darkmode-btn-nestable__checkbox, .brxc-darkmode-toggle-nestable__checkbox').checked = false;});
                localStorage.setItem("brxc-theme", "light");
            } else {
                html.setAttribute('data-theme','dark');
                toggles.forEach(cb => {cb.querySelector('input.brxc-toggle-checkbox, .brxc-darkmode-btn-nestable__checkbox, .brxc-darkmode-toggle-nestable__checkbox').checked = true;});
                localStorage.setItem("brxc-theme", "dark");
            }
        })

    })
})

window.addEventListener('load', () => {
    const toggles = document.querySelectorAll('.brxe-brxc-darkmode-toggle, .brxe-brxc-darkmode-btn, .brxe-brxc-darkmode-btn-nestable, .brxe-brxc-darkmode-toggle-nestable');
    if (toggles.length < 1) return;

    toggles.forEach(toggle => {
        toggle.classList.remove('no-animation');
        toggle.removeAttribute('data-no-animation');

    })
})
