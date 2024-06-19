import './bootstrap';
import './assets/sass/app.scss';
import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {ZiggyVue} from '../../vendor/tightenco/ziggy';
import store from "./store";
import i18n from "./i18n";
import AppLayout from "@/Layouts/AppLayout.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import * as bootstrap from "bootstrap";
import "./assets/sass/components/custom-modal.scss";
import "vue3-perfect-scrollbar/dist/vue3-perfect-scrollbar.css";
import Swal from "sweetalert2";
import VueNouislider from "vue3-nouislider";
import "vue3-nouislider/dist/vue3-nouislider.css";
import {registerScrollSpy} from "vue3-scroll-spy/dist/index";
import {ServerTable} from "v-tables-3";
//vue-wizard
// import VueFormWizard from "vue3-form-wizard";
// import "vue3-form-wizard/dist/style.css";
// set default settings
import appSetting from "./app-setting";

window.bootstrap = bootstrap;
window.Swal = Swal;
window.$appSetting = appSetting;


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title ?? 'Index'} - ${appName}`,
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true});
        let page = pages[`./Pages/${name}.vue`]
        if (!page.default.layout) {
            page.default.layout = window?.authenticated === 'app' ? AppLayout : GuestLayout
        }
        return page;
    },
    setup({el, App, props, plugin}) {
        const vueApp = createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue)
            .use(store)
            .use(i18n)
            .use(VueNouislider)
            .use(ServerTable);

        registerScrollSpy(vueApp, {offset: 118});

        vueApp.mount(el);

        return vueApp;
    },
    progress: {
        color: '#4B5563',
    },
});

window.$appSetting.init();
