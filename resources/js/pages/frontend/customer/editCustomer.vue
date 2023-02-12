<template>
    <div>
        <!-- breadcrubms -->
        <breadcrumb v-bind:page_name="page_name">
        </breadcrumb>

        <section class="pb-50">
            <div class="container">
                <div class="row">
                    <!-- Left Box Starts -->
                    <div class="col-md-4 col-lg-4 col-xl-4">
                        <UserMenu />
                       
                    </div>
                    <!-- Left Box Ends -->
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        {{ form }}
                        <span class="alert-success " v-if="msg">
                            <div class="alert alert-success " role="alert">

                                {{ msg }}
                            </div>
                        </span>
                        <!-- Recent Transactions -->
                        <div class="card mt-4 table-card">

                            <form enctype="multipart/form-data" @submit.prevent="update_customer" ref="form_1">
                                <!-- Name input -->
                                <input type="hidden" v-model="form.id" id="">
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input type="text" v-model="form.first_name" name="first_name" id="first_name"
                                            class="form-control" placeholder="First name" aria-label="First name">
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input type="text" v-model="form.last_name" name="last_name" id="last_name"
                                            class="form-control" placeholder="Last name" aria-label="Last name">
                                    </div>
                                </div>
                                <!-- Email input -->
                                <div class="row">
                                    <div class="col-md-12 form-group mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" readonly v-model="form.email" id="email" name="email"
                                            class="form-control" placeholder="Enter your email" />
                                    </div>
                                </div>
                                <!-- Phone input -->
                                <div class="row">
                                    <div class="col-md-12 form-group mb-3">
                                        <label class="form-label" for="mobile">Mobile</label>
                                        <input type="text" v-model="form.mobile" id="mobile" name="mobile"
                                            class="form-control" placeholder="Enter your mobile number" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group mb-3">
                                        <label class="form-label" for="file">Profile Pic</label>
                                        <input type="file" @change="onChange"  id="file" name="file"
                                            class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <!-- Password input -->

                                <div class="row">
                                    <div class="col-md-12 text-center text-lg-start mt-3 mb-3 pt-2">
                                        <button type="submit" class="site-btn">Edit Profile</button>

                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- Recent Transactions Ends -->
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script >
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRoute, useRouter } from 'vue-router';
import { UserStore } from '@/store/UserStore';
import { mapState } from 'pinia';
import UserMenu from '@/layouts/partials/userMenuComponent.vue';
// import breadcrumb from '../../../layouts/partials/breadCrumbComponent.vue';
import breadcrumb from '@/layouts/partials/breadCrumbComponent.vue';
import TokencheckAndLogout from '@/mixins/TokencheckAndLogout';




export default {
    mixins: [TokencheckAndLogout],
    components: { UserMenu, breadcrumb },
    created() {
        this.TokencheckAndLogout(),
        this.edit_customer();
      
    },
    mounted(){
      /*   if(localStorage.getItem('token')!=null){
    axios.get('/api/user', {
			headers: {
				Authorization: 'Bearer ' + localStorage.getItem('token'),
			},
			
		}).then(res=>{
			   console.log(res.data);
               console.log();
			// first_name.value = res.data.first_name;
		});
} */
    },
    computed: {
        ...mapState(UserStore, ['token','authUser'])
    },



    setup() {
        const page_name = ref('Edit Profile');
        const msg = ref('');
        const form = ref({
            id:'',
            first_name: '',
            last_name: '',
            email: '',
            mobile: '',


        });
        const file = ref('');

        const onChange  = (e)=>{
            file.value = e.target.files[0];
         }


        function edit_customer() {

            axios.get('/api/user/',{
                headers: {
                        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                    }
            })
                .then(
                    ({ data }) => {

                        this.result = data;
                        // console.log(data);
                        // console.log(this.result.first_name);
                        form.value.first_name = this.result.first_name;
                        form.value.id = this.result.id;
                        form.value.last_name = this.result.last_name;
                        form.value.email = this.result.email;
                        form.value.mobile = this.result.mobile;

                        axios.post('/api/get_user_data/',{
                            id:this.result.id
                        }).then(res=>{
                            console.log(res);
            });

                    }
                )
        }

     const update_customer = async ()=> {
       
            
            let form_data = new FormData();
           
            form_data.append('id',1);
            form_data.append('file',file.value);
            form_data.append('first_name',form.value.first_name);
            form_data.append('last_name',form.value.last_name);
            form_data.append('email',form.value.email);
            form_data.append('mobile',form.value.mobile); /* */
            let config  = {
                    header:{
                        'Content-Type' : 'image/png'
                    }
                };
                

           await axios.post('/api/update_customer', form_data,config).then(response => {

              /*   this.result = response.data; */


                msg.value = response.data.msg;

                console.log(response.data.msg);
                //router.push({name:"Panel"});



            });
        }

        return {
            page_name,
            edit_customer,
            update_customer,
            form,
            msg

        }

    }




}




</script>



<style>

</style>