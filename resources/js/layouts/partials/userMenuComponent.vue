<template>
    <div>
       
        <div class="card d-flex justify-content-center my-account-user-box">
            <div class="
          p-4
          image
          d-flex
          flex-column
          justify-content-center
          align-items-center
        ">
       
                <div class="user-pic">
                    <Loading v-if="loading" class="position-absolute" />
                    <span v-if="google_avatar">
                        <img :src="google_avatar" height="100" width="100" />
                    </span>
                    <span v-if="profile_pic">
                        <img :src="profile_pic" height="100" width="100" />
                    </span>
                    
                </div>
                <span class="name mt-3" v-if="authUser">{{ authUser.first_name }}</span>
                <div class="d-flex mt-2">
                    <router-link :to="{ name: 'editCustomer' }" class="btn1 btn-dark mt-2">Edit
                        Profile</router-link>
                    <router-link :to="{ name: 'DealerRegistration' }" class="btn1 btn-dark mt-2 ms-2">Become Dealer</router-link>
                </div>
            </div>
            <div class="my-account-menus mt-2">
                <ul>
                    <li>
                        <router-link :to="{ name: 'MyAccount' }"><i class="bi bi-person"></i> Profile</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'OrderHistory' }"><i class="bi bi-file-earmark-text"></i> Orders</router-link>
                    </li>
                    <li>
                        <a href=""><i class="bi bi-heart"></i> Wishlist</a>
                    </li>
                    <li>
                        <a href=""><i class="bi bi-map"></i> Address</a>
                    </li>
                    <li>
                        <a href=""><i class="bi bi-diagram-3"></i> Manage Branches</a>
                    </li>
                    <li>
                        <router-link :to="{ name: 'UserVendingMachines' }"><i class="bi bi-gear"></i> Vending Machines</router-link>    
                    </li>
                    <li>
                        <router-link :to="{ name: 'UserWallet' }"><i class="bi bi-wallet"></i> Manage Wallet</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'ChangePassword' }"><i class="bi bi-key"></i> Change Password</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'PaymentMethods' }"><i class="bi bi-credit-card"></i> Payment Methods</router-link>    
                    </li>
                    <li>
                        <a href="#!" @click="logout()"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
       
    </div>
</template>

<script>
import {ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import { UserStore } from "@/store/UserStore";
import Loading from '../partials/loaderComponent.vue';
import { mapState } from 'pinia';
import logoutComponent from "../../mixins/logout";
let google_avatar = ref('');
let profile_pic = ref('');

export default {
data(){
    return{
         
        google_avatar,
        profile_pic,
        loading:false
        }
},
    created(){
       
    this.user_info()
    },

    computed: {

        ...mapState(UserStore, ['authUser'])

    },
   

    methods:{
       
      async  user_info(){
        this.loading=true;
          //AXIOS GETTING AUTHENTICATED USER_ID
          try{
            await axios.get('/api/user',{
            headers: {
                        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                    },
         }).then(userresponse=>{
          
            axios.post('/api/user_info',{
                id:userresponse.data.id
            }).then(res=>{
                if(res.data.google_avatar.user_value){
                   this.google_avatar = res.data.google_avatar.user_value;
                }else{
                    this.profile_pic=res.data.profile_pic.user_value;
                }
              /*   if(res.data.google_avatar){
                    console.log("googlePic:"+res.data);
                }else{
                    console.log("userProfile : "+res.data);
                } */
                
            });
         });
          }catch(error){
                console.log(error);
          }finally{
            this.loading=false
          }
        
            /*  */
        }
    },


    setup() {
       
        const form = ref({
            id:''
            });

        const { logout } = logoutComponent();
            form.value.id = 1;
        return {

            logout,
            form
        }
    },
    components:{
        Loading
    }

    }
</script>

