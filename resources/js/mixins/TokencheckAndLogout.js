import axios from "axios";
import router from '@/router';
import { UserStore } from "@/store/UserStore";
export default {
  
    data() {
        return {
           /* myre:{id:"valuesfrom tokens"},
           result:[] */
        }
    },
    methods: {
        TokencheckAndLogout() {
            if (sessionStorage.getItem('token') != null) {
                axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                    },

                }).then( ({data})=>{
                    if(data.status=='Inactive'){
                        UserStore().removeToken('token');
                        router.push({name:'Login'});
                      }

                }).catch(error => {
                    if (error.response.status == 500) {
                        UserStore().removeToken('token');
                        router.push({name:'Login'});
                      
                    }

                });
            }
        }


    }
}


