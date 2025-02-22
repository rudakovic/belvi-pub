(function() {
    let darkmodeCookie = localStorage.getItem("brxc-theme");
    if(darkmodeCookie === 'light' || (!darkmodeCookie && BRXC_FORCE_DEFAULT_SCHEME_COLOR === "light") || (!darkmodeCookie && window.matchMedia('(prefers-color-scheme: light)').matches)){
        document.documentElement.setAttribute('data-theme','light');
    } else if((darkmodeCookie === 'dark' || !darkmodeCookie && BRXC_FORCE_DEFAULT_SCHEME_COLOR === "dark") || (!darkmodeCookie && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.setAttribute('data-theme','dark');
    } 
})();