import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.authenticated = document
    .querySelector("meta[name='layout']")
    .getAttribute("content");

