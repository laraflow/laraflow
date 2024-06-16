// THEME CONFIG
export const $themeConfig = {
    lang: import.meta.env.VITE_APP_LOCALE || 'en', // en, da, de, el, es, fr, hu, it, ja, pl, pt, ru, sv, tr, zh
    theme: 'light', // light, dark, system
    navigation: 'vertical', // vertical, collapsible-vertical, horizontal
    layout: 'full' // full, boxed-layout, large-boxed-layout
};
