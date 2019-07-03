import './bootstrap';
import Vue from 'vue';
import Routes from './routes.js'; 
import App from './views/App';
import store from './store/index.js';
const app = new Vue({
    el: '#app',
    router: Routes,
    store,
    render: h => h(App),
});

export default app;