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
					<h4>Change Password</h4>
				</div>
							<span class="alert-warning " v-if="msg">
							<div class="alert alert-warning " role="alert">
								{{ msg }}
							</div>
						</span>
						
						
				<!-- Change password form starts -->
				<Form @submit="handleChangePassword">
					<!-- Current Password input -->
					<div class="form-outline my-4 mb-3">
						
						<label class="form-label" for="current_password">Current Password</label>
						<Field type="password" v-model="form.current_password" id="current_password" name="current_password" class="form-control" placeholder="Enter Current Password" :rules="validatePassword" :validateOnBlur="true" :validateOnChange="true" :validateOnInput="true" />
						<span class="text-danger"><ErrorMessage name="current_password" /></span>
					</div>
					<!-- Password input -->
					<div class="form-outline mb-3">
						<label class="form-label" for="password">New Password</label>
						<Field type="password" id="password" v-model="form.password" name="password" class="form-control" placeholder="Enter New Password" :rules="validatePassword" :validateOnBlur="true" :validateOnChange="true" :validateOnInput="true" />
						<span class="text-danger"><ErrorMessage name="password" /></span>
					</div>
					<!-- Confirm Password input -->
					<div class="form-outline mb-3">
						<label class="form-label" for="confirm_password">Confirm New Password</label>
						<Field type="password" v-model="form.confirm_password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Enter Confirm New Password" rules="confirmed:@password" :validateOnBlur="true" :validateOnChange="true" :validateOnInput="true" />
						<span class="text-danger"><ErrorMessage name="confirm_password" /></span>
						
					</div>
					<div class="text-lg-start mt-4 pt-2">
						<button type="submit" class="site-btn">Change Password</button>
					</div>
				</Form>
				<!-- Change password form ends -->
			</div>
		</div>
	</div>
</section>	
   </div>
</template>

<script>
import {ref} from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import { mapState } from 'pinia';
import { UserStore } from '@/store/UserStore';

import UserMenu from '../../layouts/partials/userMenuComponent.vue';
import { Form, Field, ErrorMessage } from 'vee-validate';
import { defineRule } from 'vee-validate';

export default {
	

	mounted() {
		
	},
	computed:{
		...mapState(UserStore, ['token','authUser'])
	},
	setup() {
		let msg = ref('');
		let errormsg = ref('');
		const form = ref({
			
			current_password: '',
			password: '',
			confirm_password: ''
		});
		function validatePassword(value) {
			if (!value) {
				return 'Password is required.';
			}
			if (value.length < 6) {
				return 'Password must be at least 6 characters.';
			}
			return true;
		}

		function handleChangePassword() {

			axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                    },

                }).then(res=>{
					
					axios.post('/api/changePassword', {
				id:res.data.id,
				current_password:form.value.current_password,
				password:form.value.password,
				confirm_password:form.value.confirm_password,
			}).then(data => {
				
				form.value.current_password= null,
				form.value.password = null,
				form.value.confirm_password = null,

				msg.value=data.data.response
				


				//errormsg.value=data.data.message
				
			});
				
				});

			

		}
		defineRule('confirmed', (value, [target]) => {
			if (!value) {
				return 'Confirm password is required.';
			}
			if (value === target) {
				return true;
			}
			return 'Your password and confirm password do not match.';
		});
		
		return {
			msg,
			form,
			validatePassword,
			handleChangePassword,
			
		}
	},
	components: {
		UserMenu,
		Form,
		Field,
		ErrorMessage
	}
}

</script>



<style>

</style>