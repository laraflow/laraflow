import './bootstrap';
import './assets/sass/app.scss';
import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {ZiggyVue} from '../../vendor/tightenco/ziggy';
import store from "./store";
import i18n from "./i18n";
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
import {resolvePageComponent} from "laravel-vite-plugin/inertia-helpers";

window.bootstrap = bootstrap;
window.Swal = Swal;
window.$appSetting = appSetting;


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title ?? 'Index'} - ${appName}`,
    resolve: (name) => {
        return resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
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
        color: '#4361ee',
    },
});

window.$appSetting.init();
