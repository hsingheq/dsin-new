import './bootstrap';
import {createApp} from 'vue';


// window.Vue = require('vue');



import { Bootstrap4Pagination } from 'laravel-vue-pagination';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import { TailwindPagination } from 'laravel-vue-pagination';

  import axios from 'axios'; 
  


//  import VueAxios from 'vue-axios';
  // import VueRouter from 'vue-router';
import router from './router';
// import store from './store/index.js';
import App from './layouts/App.vue';
import './asset/js/jquery.js'; 
//import jQuery from "jquery";
//import $ from 'jquery';

import swal from 'sweetalert';
const base_url = import.meta.env.VITE_MY_ENV_VARIABLE;
const google_client_id = import.meta.env.VITE_GOOGLE_CLIENT_ID;

axios.defaults.withCredentials = true;
axios.defaults.baseURL=base_url;
const token = localStorage.getItem('token')
if(token){
  axios.defaults.headers.common['Authorization'] = token
} 
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
// import vue3GoogleLogin from 'vue3-google-login';

import 'jquery-nice-select/js/jquery.nice-select';
import './asset/css/default.css';
import './asset/vendor/bootstrap-icons/bootstrap-icons.css';
import './asset/css/mega-menu.css';
import './asset/css/animate.css';
import './asset/css/magnific-popup.css';
import 'jquery-nice-select/css/nice-select.css';
import './asset/css/style.css';


//js
 

import './asset/js/mega-menu.js';

import './asset/js/magnific-popup.js';
import './asset/js/backtotop.js';
 import './asset/js/nice-select.js'; 
import './asset/js/countdown.min.js';
import './asset/js/counterup.js';
import './asset/js/isotope-pkgd.js';
import './asset/js/imagesloaded-pkgd.js';
/*  import './asset/js/main.js';   */
 import './asset/js/theme-scripts.js';
import { createPinia } from 'pinia';
import vue3GoogleLogin from 'vue3-google-login';
import VueNextSelect from 'vue-next-select'
import 'vue-next-select/dist/index.min.css'


/**
 * AXIOS CALLING FOR IMPORTANT SETTINGS
 */
/*  */
 /* let google_client_id='';
		axios.get('/api/social_settings')
            .then(
                ({ data }) => {
					//console.log(data.data.google_client_id);
                    google_client_id = data.data.google_client_id;
                    //console.log(this.result.data);
                    //this.results = this.result.data
                }
            );*/


const app = createApp(App)
 .use(vue3GoogleLogin, {
  clientId: google_client_id
})
app.use(router)
app.use(createPinia())
// .use(store)
app.component('vue-select', VueNextSelect)


app.mount("#app")