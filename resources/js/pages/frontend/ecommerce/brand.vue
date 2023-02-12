<template>
    <div class="container">
     <h3>{{ brand }}</h3> 
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  
  import axios from 'axios';
  import { useRoute, useRouter } from 'vue-router';
  import router from '@/router';
  
  export default {
  
    name: "Brand",
    data(){
      return {
          brand:''
      }
    },
    async mounted(){
      const route = useRoute();
        //console.log(route.params.slug);
        await axios.post('/api/get_brand',{
          slug:route.params.slug
        }).then(res=>{
         this.brand = res.data.response.brand;
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
  
  