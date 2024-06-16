import './bootstrap';
import './assets/sass/app.scss';
import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy';
import store from "./store";

// bootstrap
import * as bootstrap from "bootstrap";

window.bootstrap = bootstrap;

// modals
import "./assets/sass/components/custom-modal.scss";

// perfect scrollbar
import PerfectScrollbar from "vue3-perfect-scrollbar";
import "vue3-perfect-scrollbar/dist/vue3-perfect-scrollbar.css";

//Sweetalert
import Swal from "sweetalert2";

window.Swal = Swal;

// nouislider - later remove and add to page due to not working in page
import VueNouislider from "vue3-nouislider";
import "vue3-nouislider/dist/vue3-nouislider.css";

// vue input mask
import Maska from "maska";

// smooth scroll
import {registerScrollSpy} from "vue3-scroll-spy/dist/index";

//vue-i18n
import i18n from "./i18n";

// datatables
import {ClientTable} from "v-tables-3";

// json to excel
import vue3JsonExcel from "vue3-json-excel";

//vue-wizard
import VueFormWizard from "vue3-form-wizard";
import "vue3-form-wizard/dist/style.css";

// set default settings
import appSetting from "./app-setting";

window.$appSetting = appSetting;

//markdown editor
import VueEasymde from 'vue3-easymde';
import "easymde/dist/easymde.min.css";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        const vueApp = createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue)
            .use(store)
            .use(i18n)
            .use(PerfectScrollbar)
            .use(VueNouislider)
            .use(Maska)
            .use(ClientTable)
            .use(vue3JsonExcel)
            .use(VueFormWizard)
            .use(VueEasymde);

        registerScrollSpy(vueApp, {offset: 118});

        vueApp.mount(el);

        return vueApp;
    },
    progress: {
        color: '#4B5563',
    },
});

window.$appSetting.init();
