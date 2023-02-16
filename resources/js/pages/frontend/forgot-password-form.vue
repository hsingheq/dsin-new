<script>
import axios from 'axios';
import { Form, Field } from 'vee-validate';
import * as Yup from 'yup';
export default {
	components: {
		Form,
		Field,
	},
	data() {
		const schema = Yup.object().shape({
			email: Yup.string().email('Email is invalid.').required('Email is required.'),
		});
		return {
			email: null,
			has_error: false,
			error: "",
			schema
		}
	},
	methods: {
		async requestResetPassword() {
			try {
				this.error = "Please wait..";
				await axios.post('/api/forgot-password', {
					email: this.email,
				}).then(response => {
					this.error = response.data.data;
					
				})
			} catch (dataerror) {
				if (dataerror.response) {
					this.error = dataerror.response.data.error
				}
			} finally {
				//this.isLoading = false
			}
		}
	}
}
</script>
<style>
.login-box .site-btn {
	width: 100%;
}

.login-box h1 {
	font-size: 24px;
	position: relative;
	padding-bottom: 10px;
	margin-bottom: 30px;
}

.login-box h1:after {
	content: "";
	position: absolute;
	width: 50px;
	height: 5px;
	bottom: 0;
	left: 0;
	background: var(--color-primary);
}
</style>
<template>
	<div>
		<Loading v-if="isLoading" />
		<div class="login-wrapper">
			<!-- Main Content Starts -->
			<section class="box-plr-75">
				<div class="container">
					<div class="row">
						<div class="col-xxl-12">
							<div class="breadcrumb-wrapper">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
										<li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="pb-50">
				<div class="container-fluid h-custom">
					<div class="row d-flex justify-content-center align-items-center">
						<div class="col-md-8 col-lg-6 col-xl-4 login-box">
							<h1>Reset Password</h1>

							<span class="alert-danger" v-if="error">
								<div class="alert alert-danger" role="alert">
									{{ error }}
								</div>
							</span>
							<p v-else>Please enter your email address. You will receive a link to create a new password via
									email.</p>	
							<Form @submit="requestResetPassword" :validation-schema="schema" v-slot="{ errors }">
								
								<!-- Email input -->
								<div class="form-outline mb-4">
									<label class="form-label" for="email">Email address</label>
									<Field type="email" id="email" v-model="email" name="email"
										class="form-control form-control-lg" placeholder="Enter a valid email address"
										:class="{ 'is-invalid': errors.email }" :validateOnChange="true"
										:validateOnInput="true" />
									<div class="invalid-feedback">{{ errors.email }}</div>
								</div>
								<div class="text-center text-lg-start mt-4 pt-2">
									<button type="submit" class="site-btn">Send Password Reset Link</button>
								</div>
							</Form>
							<p class="small text-center mt-20 mb-0"><router-link :to="{ name: 'Login' }"
									class="link-info">Login</router-link></p>

						</div>
					</div>
				</div>
			</section>
			<!-- Main Content Ends -->
		</div>
	</div>
</template>