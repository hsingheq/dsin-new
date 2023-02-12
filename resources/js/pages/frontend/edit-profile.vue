<template>
   <div>
    <section class="box-plr-75">
	<div class="container">
		<div class="row">
			<div class="col-xxl-12">
				<div class="breadcrumb-wrapper">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><router-link :to="{name:'/'}">Home</router-link></li>
							<li class="breadcrumb-item active" aria-current="page">My Account</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="pb-50">
	<div class="container">
		<div class="row">
			<!-- Left Box Starts -->
			<div class="col-md-4 col-lg-4 col-xl-4">				
			<UserMenu/>
			</div>
			<!-- Left Box Ends -->
			<div class="col-md-8 col-lg-8 col-xl-8">
				<div class="page-heading">
					<h4>Update Profile</h4>
				</div>
				<!-- Change password form starts -->
				<form @submit.prevent="handleChangePassword">
					<!-- Name input -->
						<div class="form-outline my-4 mb-3 row">
							<div class="col-md-6">
								<label class="form-label" for="first_name">First Name</label>
								<input type="text" id="first_name" name="first_name" v-model="form.first_name" class="form-control" />	
							</div>
							<div class="col-md-6">
								<label class="form-label" for="last_name">Last Name</label>
								<input type="text" id="last_name" name="last_name" v-model="form.last_name" class="form-control" placeholder="" />	
							</div>		
						</div>
					<!-- Email input -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="email">Email</label>
							<input type="email" v-model="form.email" id="email" name="email" class="form-control" />
						</div>	
					</div>
					<!-- Mobile input -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="mobile">Mobile</label>
							<input type="text" v-model="form.mobile" id="mobile" name="mobile" class="form-control" />
						</div>
					</div>
					<!-- Profile Picture input -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="profile_pic">Profile Picture</label>
							<input type="file" id="profile_pic" name="profile_pic" class="form-control" />
						</div>	
					</div>
					<div class="text-lg-start mt-4 pt-2 row">
						<div class="col-md-12">
							<button type="button" class="site-btn">Update</button>
						</div>
					</div>
				</form>
				<!-- Change password form ends -->
			</div>
		</div>
	</div>
</section>	
   </div>
</template>

<script setup>
import {ref} from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import { UserStore } from '../../store/UserStore';
import UserMenu from '../../layouts/partials/userMenuComponent.vue';

const router = useRouter();
const store = UserStore();

const form = ref({
	current_password: '',
	password: '',
	confirm_password: ''
});

let error = ref('');

const handleChangePassword = async () => {
	await axios.post('/api/changePassword',{
		current_password:form.value.current_password,
		password:form.value.password,
		confirm_password:form.value.confirm_password
	}).then(res=>{
		console.log(res);
		//alert(res.data.success);
                /*if(res.data.success){
					store.setEmail(res.data.data.email);
					store.setName(res.data.data.name);

                   // console.log(res.data.data.email);
					router.push({name:"Panel"});
                  //console.log(res.data.data);
                }else{
					error.value = res.data.message;
                    console.log();
                }*/
               
            });
	//router.push("/");
}

let name = localStorage.getItem('name');
function logout(){
store.removeEmail('email');
 /*    localStorage.removeItem('email');
   localStorage.getItem('name'); */
    router.push({name:'/'});
}

   
   components : {
     
      UserMenu
       
   }

</script>



<style>

</style>