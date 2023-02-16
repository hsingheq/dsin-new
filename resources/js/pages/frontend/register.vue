
<script >
import { ref } from 'vue';
import axios from 'axios';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as Yup from 'yup';
import "intl-tel-input/build/css/intlTelInput.css";
import intlTelInput from "intl-tel-input";

export default {
	components: {
		Form,
		Field,
	},
	data() {
		const form = {
			first_name: 'Ajay',
			last_name: 'Singh',
			email: 'aa@aa.com',
			mobile: '123',
			password: '123456',
			password_confirmation: '123456',
		}
		const schema = Yup.object().shape({
			first_name: Yup.string().required('First name is required.').max(10, 'First name should not be more than 10 characters.'),
			last_name: Yup.string().max(10, 'Last name should not be more than 10 characters.'),
			email: Yup.string().email("Invalid email.").required('Email is required.'),
			password: Yup.string().required('Password is required.').min(6, "Password must be at least 6 characters."),
			password_confirmation: Yup.string().oneOf([Yup.ref('password'), null], 'Passwords must match'),
			mobile: Yup.string().required('Mobile is required.').matches(/^[0-9]+$/, "Must be only digits"),
			//mobile: Yup.string().required('Mobile is required.').matches(/^[0-9]+$/, "Must be only digits").min(10, 'Mobile number must be at least 10 digits.').max(11, 'Mobile number must be max 11 digits.'),
		});
		return {
			form,
			schema,
			has_error: false,
			error: '',
			serrors: {},
			success: false
		}
	},
	mounted() {
		const input = document.querySelector("#mobile");
		intlTelInput(input, {
			// any initialisation options go here
			preferredCountries: ["my", "us", "ca"],
		});
	},
	methods: {
		async registerHandle() {
			try {
				await axios.post('/api/create_user', {
					first_name: this.form.first_name,
					last_name: this.form.last_name,
					email: this.form.email,
					mobile: this.form.mobile,
					password: this.form.password,
					password_confirmation: this.form.password_confirmation,
				}).then(response => {
					this.success = response.data.success
					this.serrors = {}
					//this.error = response.data.data;
				})
			} catch (res) {
				this.has_error = true
				this.serrors = res.response.data.errors || {}
				/*if (dataerror.response) {
					this.error = dataerror.response.data.message
				}*/
			}
		}
	}
}
</script>
<style scoped>
.help-block {
	display: none;
}

.has-error .help-block {
	width: 100%;
	margin-top: 0.25rem;
	font-size: .875em;
	color: #dc3545;
	display: block;
}
</style>
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
						<div class="alert alert-danger" v-if="has_error && !success">
							<p>Please check error!</p>
							<!--<span v-for="(serror, index) in serrors">
								{{ serror }}
							</span>-->
						</div>
						<div class="alert alert-success" v-if="!has_error && success">
							{{ success }}
						</div>
						<Form @submit="registerHandle" :validation-schema="schema" v-slot="{ errors }"
							autocomplete="off">
							<!-- Name input -->
							<div class="row">
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="first_name">First Name</label>
									<Field type="text" v-model="form.first_name" name="first_name" id="first_name"
										class="form-control" placeholder="First name" aria-label="First name"
										:class="{ 'is-invalid': errors.first_name }" :validateOnChange="true"
										:validateOnInput="true" />
									<div class="invalid-feedback">{{ errors.first_name }}</div>
								</div>
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="last_name">Last Name</label>
									<Field type="text" v-model="form.last_name" name="last_name" id="last_name"
										class="form-control" placeholder="Last name" aria-label="Last name"
										:class="{ 'is-invalid': errors.last_name }" :validateOnChange="false"
										:validateOnInput="true" />
									<div class="invalid-feedback">{{ errors.last_name }}</div>

								</div>
							</div>
							<!-- Email input -->
							<div class="row">
								<div class="col-md-12 form-group mb-3"
									v-bind:class="{ 'has-error': has_error && serrors.email }">
									<label class="form-label" for="email">Email</label>
									<Field type="email" v-model="form.email" id="email" name="email"
										class="form-control" placeholder="Enter your email"
										:class="{ 'is-invalid': errors.email }" :validateOnChange="false"
										:validateOnInput="true" />
									<div class="invalid-feedback" v-if="errors">{{ errors.email }}</div>
									<div class="help-block" v-if="!errors.email && has_error && serrors.email">
										<span v-for="(serror, index) in serrors.email">
											{{ serror }}
										</span>
									</div>
								</div>
							</div>


							<!-- Phone input -->
							<div class="row">
								<div class="col-md-12 form-group mb-3">
									<label class="form-label" for="mobile">Mobile</label>
									<Field type="number" v-model="form.mobile" id="mobile" name="mobile"
										class="form-control" placeholder="Enter your mobile number"
										:class="{ 'is-invalid': errors.mobile }" :validateOnChange="false"
										:validateOnInput="true" />
									<div class="invalid-feedback">{{ errors.mobile }}</div>

								</div>
							</div>
							<!-- Password input -->
							<div class="row">
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="password">Password</label>
									<Field type="password" v-model="form.password" id="password" name="password"
										class="form-control" placeholder="Enter password"
										:class="{ 'is-invalid': errors.password }" :validateOnChange="true"
										:validateOnInput="true" />
									<div class="invalid-feedback">{{ errors.password }}</div>

								</div>
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="password_confirmation">Confirm Password</label>
									<Field type="password" v-model="form.password_confirmation"
										id="password_confirmation" name="password_confirmation" class="form-control"
										placeholder="Enter confirm password"
										:class="{ 'is-invalid': errors.password_confirmation }" :validateOnChange="true"
										:validateOnInput="true" />
									<div class="invalid-feedback">{{ errors.password_confirmation }}</div>

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