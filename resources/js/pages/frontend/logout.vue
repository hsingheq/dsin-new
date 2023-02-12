<template>
<div>
    ..logout
</div>
</template>

<noscript>
import {ref, onMounted} from 'vue';
import { useRoute, useRouter } from 'vue-router';
/*import { extendDefaults } from '../../asset/js/swiper';*/
import { UserStore } from '../../store/UserStore';
const store = UserStore();
const router = useRouter();


    export default {
   
    created(){
    this.logout()
   
  },
  methods:{
    logout(){
            store.removeEmail('email');
            store.removeEmail('name');
            router.push({name:'/'});
    }
  }
}
</noscript>

<style>

</style>