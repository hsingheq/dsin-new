import './bootstrap';
import {createApp} from 'vue'
import router from './router';
import Nav from './layouts/Nav.vue';
//import Signup from './layouts/Signup.vue'

//createApp(Signup).use(router).mount("#signup");

createApp(Nav).use(router).mount("#nav")
