require('./bootstrap');
import { createApp } from 'vue';
  
import App from './components/App.vue';
import { createWebHistory, createRouter } from "vue-router";
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
  
const app = createApp(App)
  
app.use(VueAxios, axios);

const router = createRouter({
	history: createWebHistory(),
	routes: routes
});
  
/*const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});*/

app.use(router).mount("#app")