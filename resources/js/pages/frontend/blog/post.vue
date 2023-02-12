<template>
    <div class="container">
     <h3>{{ post }}</h3> 
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  
  import axios from 'axios';
  import { useRoute, useRouter } from 'vue-router';
  import router from '@/router';
  
  export default {
  
    name: "Blog",
    data(){
      return {
          post:''
      }
    },
    async mounted(){
      const route = useRoute();
        //console.log(route.params.slug);
        await axios.post('/api/get_post',{
          slug:route.params.slug
        }).then(res=>{
         this.post = res.data.response.title;
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
  
  