
<script >
import { ref } from 'vue';
import axios from 'axios';
import useVuelidate from "@vuelidate/core";
import { required, minLength, maxLength, helpers, numeric, sameAs, email } from "@vuelidate/validators";
import "intl-tel-input/build/css/intlTelInput.css";
import intlTelInput from "intl-tel-input";
const isEmailTaken = (value) => fetch(`/api/checkEmail/${value}`).then(r => r.json())
const { withAsync } = helpers
export default {
	name: "User Registration",
	/*components: {
		Form,
		Field,
	},*/
	data() {
		return {
			showForm: true,
			first_name: "",
			last_name: "",
			email: "",
			mobile: "",
			password: "",
			password_confirmation: "",
			submitStatus: null,
			message: null
		}
	},
	validations() {
		const localRules = {
			first_name: {
				required: helpers.withMessage("First Name is required.", required),
				minLength: helpers.withMessage("First Name must be atleast 2 charactors.", minLength(2)),
				maxLength: helpers.withMessage("First Name should not be greater than 10 charactors.", maxLength(10)),
			},
			last_name: {
				maxLength: helpers.withMessage("Last Name should not be greater than 10 charactors.", maxLength(10)),
			},
			email: {
				required: helpers.withMessage("Email is required.", required),
				email: helpers.withMessage("Email is invalid.", email),
				isUnique: helpers.withAsync(isEmailTaken)
			},
			password: {
				required: helpers.withMessage("Password is required.", required),
				maxLength: helpers.withMessage("Last Name should not be greater than 10 charactors.", maxLength(10)),
			},
			password_confirmation: {
				//required: helpers.withMessage("Confirm Password is required.", required),
				sameAs: helpers.withMessage("Passwords must match.", sameAs(this.password)),
			},
			mobile: {
				required: helpers.withMessage("Mobile is required.", required),
				numeric: helpers.withMessage("Mobile must contain only numbers.", numeric),
				minLength: helpers.withMessage("Mobile must be atleast 10 digits.", minLength(10)),
				maxLength: helpers.withMessage("Mobile should not be greater than 11 charactors.", maxLength(11)),
			},
		}
		return localRules
	},
	setup: () => ({ v$: useVuelidate() }),
	mounted() {
		const input = document.querySelector("#mobile");
		intlTelInput(input, {
			// any initialisation options go here
			preferredCountries: ["my", "us", "ca"],
		});
	},
	methods: {
		async registerHandle(values, actions) {
			console.log('submit!')
			this.submitStatus = 'Submit'
			this.v$.$touch()
			if (this.v$.$invalid) {
				this.submitStatus = 'Error'
				this.message = 'Please check errors.'
			} else {
				// do your submit logic here
				this.submitStatus = 'Pending'
				this.message = 'Please wait...'
				try {
					await axios.post('/api/create_user', {
						first_name: this.first_name,
						last_name: this.last_name,
						email: this.email,
						mobile: this.mobile,
						password: this.password,
						password_confirmation: this.password_confirmation,
					}).then(response => {
						console.log(response)
						//this.success = response.data.success
						//this.serrors = {}
						this.submitStatus = 'Success'
						//this.v$.$reset()
						//actions.resetForm()
						//alert(response.data.success)
						this.showForm = false
						this.message = response.data.success
					})
				} catch (res) {
					console.log(res)
					this.success = "";
					this.submitStatus = 'Error'
					if (res.response) {
						this.message = res.response.data.errors || {}
					}
					/*if (dataerror.response) {
						this.error = dataerror.response.data.message
						
					}*/
					
					//this.has_error = true
					//this.serrors = res.response.data.errors || {}
				}
				/*setTimeout(() => {
					this.showForm = false;
					this.submitStatus = 'Success'
				}, 500)*/
			}

		}
	}
}
/*Validator.extend('unique', {
	validate: isUnique,
	getMessage: (field, params, data) => {
		return data.message;
	}
});*/
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
							<div class="col-lg-12 mb-3">
								<h5 class="page-heading">Register</h5>
							</div>
							<div class="col-lg-12" v-if="submitStatus=='Success'">
								<span class="alert alert-success d-block">
									{{ message }}		
								</span>
							</div>
							<div class="col-lg-12" v-if="submitStatus=='Error'">
								<span class="alert alert-danger d-block">
									{{ message }}		
								</span>
							</div>
							<div class="col-lg-12" v-if="submitStatus=='Pending'">
								<span class="alert alert-info d-block">
									{{ message }}		
								</span>
							</div>
						</div>
						<Form @submit.prevent="registerHandle" autocomplete="off" v-if="showForm">
							<!-- Name input -->
							<div class="row">
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="first_name">First Name</label>
									<input type="text" name="first_name" id="first_name" class="form-control"
										placeholder="First name" v-model="v$.first_name.$model"
										:class="{ valid: !v$.first_name.$error && v$.first_name.$dirty, 'is-invalid': v$.first_name.$error }" />
									<div class="invalid-feedback" v-for="(error, index) in v$.first_name.$errors"
										:key="index">
										{{ error.$message }}
									</div>
								</div>
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="last_name">Last Name</label>
									<input type="text" name="last_name" id="last_name" class="form-control"
										placeholder="Last name" v-model="v$.last_name.$model"
										:class="{ valid: !v$.last_name.$error && v$.last_name.$dirty, 'is-invalid': v$.last_name.$error }" />
									<div class="invalid-feedback" v-for="(error, index) in v$.last_name.$errors"
										:key="index">
										{{ error.$message }}
									</div>
								</div>
							</div>
							<!-- Email input -->
							<div class="row">
								<div class="col-md-12 form-group mb-3">
									<label class="form-label" for="email">Email</label>
									<input type="email" id="email" name="email" class="form-control"
										placeholder="Enter your email" v-model="v$.email.$model"
										:class="{ valid: !v$.email.$error && v$.email.$dirty, 'is-invalid': v$.email.$error }" />
									<div class="invalid-feedback" v-for="(error, index) in v$.email.$errors" :key="index">
										{{ error.$message }}
									</div>
									<div v-if="v$.email.isUnique.$invalid"
										:class="{ 'invalid-feedback d-block': v$.email.isUnique.$invalid }">
										This email already has an account.
									</div>
								</div>
							</div>
							<!-- Phone input -->
							<div class="row">
								<div class="col-md-12 form-group mb-3">
									<label class="form-label" for="mobile">Mobile</label>
									<input type="text" id="mobile" name="mobile" class="form-control"
										v-model="v$.mobile.$model"
										:class="{ valid: !v$.mobile.$error && v$.mobile.$dirty, 'is-invalid': v$.mobile.$error }" />
									<div class="invalid-feedback" v-if="v$.mobile.$dirty && v$.mobile.$error"
										:class="{ 'd-block': v$.mobile.$dirty && v$.mobile.$error }"
										v-for="(error, index) in v$.mobile.$errors" :key="index">
										{{ error.$message }}
									</div>
								</div>
							</div>
							<!-- Password input -->
							<div class="row">
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="password">Password</label>
									<input type="password" id="password" name="password" class="form-control"
										placeholder="Enter password" v-model="v$.password.$model"
										:class="{ valid: !v$.password.$error && v$.password.$dirty, 'is-invalid': v$.password.$error }" />
									<div class="invalid-feedback" v-for="(error, index) in v$.password.$errors"
										:key="index">
										{{ error.$message }}
									</div>
								</div>
								<div class="col-md-6 form-group mb-3">
									<label class="form-label" for="password_confirmation">Confirm Password</label>
									<input type="password" id="password_confirmation" name="password_confirmation"
										class="form-control" placeholder="Enter password"
										v-model="v$.password_confirmation.$model"
										:class="{ valid: !v$.password_confirmation.$error && v$.password_confirmation.$dirty, 'is-invalid': v$.password_confirmation.$error }" />
									<div class="invalid-feedback" v-for="(error, index) in v$.password_confirmation.$errors"
										:key="index">
										{{ error.$message }}
									</div>
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