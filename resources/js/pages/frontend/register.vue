<template>

	<div>
		<section class="box-plr-75">
			<div class="container">
				<div class="row">
					<div class="col-xxl-12">
						<div class="breadcrumb-wrapper">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
									<li class="breadcrumb-item active" aria-current="page">Register</li>
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
					<div class="col-md-8 offset-md-2">
						<div class="row">
							<div class="col-md-12 mb-3">
								<h5 class="page-heading">Register</h5>

							</div>
						</div>
						<!--  <span>{{ form }}</span>-->
						<span class="alert-success " v-if="msg">
							<div class="alert alert-success " role="alert">
								{{ msg }}
							</div>
						</span>
						<span class="alert-danger" v-if="errormsg">
							<div class="alert alert-danger" role="alert">
								{{ errormsg }}
							</div>
						</span>
						<Form @submit="registerHandle" v-if="hideForm==''"  >
							<!-- Name input -->
							<div class="row">
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="first_name">First Name</label>
									<Field type="text" v-model="form.first_name" name="first_name" id="first_name"
										class="form-control" placeholder="First name" aria-label="First name"
										:rules="validateFirst_name" />
									<span class="text-danger">
										<ErrorMessage name="first_name" />
									</span>
								</div>
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="last_name">Last Name</label>
									<Field type="text" v-model="form.last_name" name="last_name" id="last_name"
										class="form-control" placeholder="Last name" aria-label="Last name"
										 />
									<!-- <span class="text-danger">
										<ErrorMessage name="last_name" />
									</span> -->

								</div>
							</div>
							<!-- Email input -->
							<div class="row">
								<div class="col-md-12 form-group mb-3">
									<label class="form-label" for="email">Email</label>
									<Field type="email" v-model="form.email" id="email" name="email"
										class="form-control" placeholder="Enter your email" :rules="validateEmail" />
									<span class="text-danger">
										<ErrorMessage name="email" />
									</span>

								</div>
							</div>


							<!-- Phone input -->
							<div class="row">
								<div class="col-md-12 form-group mb-3">
									<label class="form-label" for="mobile">Mobile</label>
									<Field type="number" v-model="form.mobile" id="mobile" name="mobile"
										class="form-control" placeholder="Enter your mobile number"
										:rules="validateMobile" />
									<span class="text-danger">
										<ErrorMessage name="mobile" />
									</span>

								</div>
							</div>
							<!-- Password input -->
							<div class="row">
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="password">Password</label>
									<Field type="password" v-model="form.password" id="password" name="password"
										class="form-control" placeholder="Enter password" :rules="validatePassword" />
									<span class="text-danger">
										<ErrorMessage name="password" />
									</span>

								</div>
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="password_confirmation">Confirm Password</label>
									<Field type="password" v-model="form.password_confirmation"
										id="password_confirmation" name="confirmation" class="form-control"
										placeholder="Enter confirm password" rules="confirmed:@password" />
									<span class="text-danger">
										<ErrorMessage name="confirmation" />
									</span>

								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-center text-lg-start mt-3 mb-3 pt-2">
									<button type="submit" class="site-btn">Register</button>
									<p class="small mt-2 pt-1 mb-0">Have an account? <router-link to="/login"
											class="link-info">Login</router-link></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="divider d-flex align-items-center my-1">
										<p class="text-center fw-bold mx-3 mb-0">Or</p>
									</div>
									<div
										class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
										<p class="lead fw-normal mb-0 me-3">Sign up with</p>
										<button type="button" class="btn btn-primary btn-floating mx-1">
											<i class="bi bi-facebook"></i>
										</button>
										<button type="button" class="btn btn-primary btn-floating mx-1">
											<i class="bi bi-google"></i>
										</button>
									</div>
								</div>
							</div>
						</Form>
					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script >
import { ref } from 'vue';

import axios from 'axios';
import { useRouter } from 'vue-router';
import router from '../../router';
import { Form, Field, ErrorMessage } from 'vee-validate';
import { defineRule } from 'vee-validate';
import { nextTick } from 'vue';
import 'intl-tel-input/build/css/intlTelInput.css';
import 'intl-tel-input/build/js/intlTelInput.js';
import intlTelInput from 'intl-tel-input';
export default {
	mounted() {
		const input = document.querySelector("#mobile");
		intlTelInput(input, {
			// any initialisation options go here
			preferredCountries: ["my", "us", "ca"],


		});

	},
	setup() {
		let hideForm = ref('');

		let msg = ref('');
		let errormsg = ref('');
		const form = ref({

			first_name: '',
			last_name: '',
			email: '',
			mobile: '',
			password: '',
			password_confirmation: '',

		});

		// const registerHandle = async (values) => {
		function registerHandle(event) {
			axios.post('/api/create_user', {
				first_name: form.value.first_name,
				last_name: form.value.last_name,
				email: form.value.email,
				mobile: form.value.mobile,
				password: form.value.password,
				password_confirmation: form.value.password_confirmation,
			}).then(res => {
				if (res.data.success) {
					form.value.first_name = form.first_name,
						form.value.last_name = form.last_name,
						form.value.email = null,
						form.value.mobile = null,
						form.value.password = null,
						form.value.password_confirmation = null,
						
						msg.value = res.data.message;
					errormsg.value = res.data.errormsg;
					hideForm.value = 'true';


					console.log(res.data.message);


				} else {

				}

			});

		}


		function validateEmail(value) {

			if (!value) {
				return 'This field is required.';
			}

			const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
			if (!regex.test(value)) {
				return 'This field must be a valid email.';
			}

			return true;
		}

		function validateFirst_name(value) {

			if (!value) {
				return 'This field is required.';
			}
			if (value.length <= 3) {
				return 'First Name should be greater than 3 characters.';
			}
			if (value.length > 10) {
				return 'First Name should  not be greater than 10 characters.';
			}
			const regex = /^[A-Za-z]+$/i;
			if (!regex.test(value)) {
				return 'This field must be a valid.';
			}

			return true;
		}


		
		function validateMobile(value) {
			if (!value) {
				return 'This field is required.';
			}

			if (value.length < 11) {
				return 'mobile should be   11 Digit.';
			}
			if (value.length > 11) {
				return 'mobile should  not be greater than 11 Digit.';
			}
			const regex = /^[0-9]+$/i;
			if (!regex.test(value)) {
				return 'This field must be a valid.';
			}

			return true;
		}

		function validatePassword(value) {
			if (!value) {
				return 'This field is required.';
			}


			if (value.length < 6) {
				return 'mobile should   be greater than 5 Digit.';
			}


			return true;
		}
		defineRule('confirmed', (value, [target]) => {
			if (!value) {
				return 'This field is required.';
			}
			if (value === target) {
				return true;
			}
			return 'Passwords must match';
		});


		return {
			msg,
			form,
			registerHandle,
			validateEmail,
			validateFirst_name,
			validateMobile,
			validatePassword,
			hideForm



		}


	}, components: {
		Form,
		Field,
		ErrorMessage,
	},





}



</script>

<style>

</style>