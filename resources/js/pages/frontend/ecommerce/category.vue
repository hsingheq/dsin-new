<template>
  <div class="container">
   <h3>{{ category }}</h3> 
  </div>
</template>

<script>
import { ref } from 'vue';

import axios from 'axios';
import { useRoute, useRouter } from 'vue-router';
import router from '@/router';

export default {

  name: "Product Category",
  data(){
    return {
        category:''
    }
  },
  async mounted(){
    const route = useRoute();
      //console.log(route.params.slug);
      await axios.post('/api/get_category',{
        slug:route.params.slug
      }).then(res=>{
       this.category = res.data.response.category;
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

