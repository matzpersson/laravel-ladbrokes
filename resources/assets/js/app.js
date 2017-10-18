import './bootstrap';
import App from './components/App.vue'
import router from './routes';

new Vue(Vue.util.extend({ router }, App)).$mount('#app');
