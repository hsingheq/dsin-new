<template>
    <Loading v-if="isLoading" />
    <div>
     <!--   <helloComponent>

       </helloComponent>  -->
        <headerComponent
         :logo="results.site_logo" 
         :femail="results.footer_email" 
         :fphone="results.footer_phone">
        </headerComponent>


        <router-view></router-view>

        <footerComponent 
        :femail="results.footer_email" 
        :fphone="results.footer_phone"
        :about="results.footer_about"
        :copy_right="results.copy_right"
        :address="results.footer_address">
        </footerComponent>


    </div>
</template>

<script>
import headerComponent from "./partials/headerComponent.vue";
import footerComponent from "./partials/footerComponent.vue";
import helloComponent from "./partials/helloComponent.vue";
import Loading from './partials/loaderComponent.vue';
import Home from "../pages/frontend/index.vue";
import asset_path from '@/mixins/asset_path';


export default {
    mixins: [asset_path],
    props: {
    msg: String
  },
 
    created() {
        axios.get('/api/get_setting_data/')
            .then(
                ({ data }) => {
                    this.result = data;
                    //console.log(this.result.data);
                    this.results = this.result.data
                }
            );

           	
    },



    
    data() {
        return {
            results: [],
        }
    },
    mounted() {
    },
    components: {
        headerComponent,
        footerComponent,
        Home,
        helloComponent
    },

    methods: {
    
  },
   

    /* setup() {
   
  } */

};
</script>