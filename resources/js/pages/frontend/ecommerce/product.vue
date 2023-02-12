<template>
    <div class="container">
     <h3>{{ product }}</h3> 
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  
  import axios from 'axios';
  import { useRoute, useRouter } from 'vue-router';
  import router from '@/router';
  
  export default {
  
    name: "Product",
    data(){
      return {
          product:''
      }
    },
    async mounted(){
      const route = useRoute();
        //console.log(route.params.slug);
        await axios.post('/api/get_product',{
          slug:route.params.slug
        }).then(res=>{
         this.product = res.data.response.product_title;
       // console.log(res.data.response.product_title);
        });
  
     // axios.get();
    }
  }
  </script>
  
  <style scoped>
  .container{
    text-align:center;
    padding-top:100px;
    min-height:300px;
  
  }
  </style>
  
  