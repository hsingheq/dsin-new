<template>
	<div>
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
										<li class="breadcrumb-item active" aria-current="page">Login</li>
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
							<h1>Login</h1>
							<form @submit.prevent="handleLogin">
								
								<span class="alert-danger" v-if="error">
									<div class="alert alert-danger" role="alert">
										{{ error }}
									</div>
								</span>
								<!-- {{ form }} -->
								<!-- Email input -->
								<div class="form-outline mb-4">
									<label class="form-label" for="email">Email address</label>
									<input type="email" id="email" v-model="form.email" name="email"
										class="form-control form-control-lg"
										placeholder="Enter a valid email address" />
								</div>
								<!-- Password input -->
								<div class="form-outline mb-3">
									<label class="form-label" for="password">Password</label>
									<input type="password" v-model="form.password" id="password" name="password"
										class="form-control form-control-lg" placeholder="Enter password" />
								</div>
								<div class="d-flex justify-content-between align-items-center">
									<!-- Checkbox -->
									<div class="form-check mb-0">
										<input class="form-check-input me-2" type="checkbox" value="" name="remember-me"
											id="remember-me" />
										<label class="form-check-label" for="remember-me"> Remember me </label>
									</div>
									<a href="forget-password.php" class="text-body">Forgot password?</a>
								</div>
								<div class="text-center text-lg-start mt-4 pt-2">
									<button type="submit" class="site-btn">Login</button>
								</div>
							</form>
							<div class="align-items-center justify-content-center w-100 mt-20" v-if="google_enable=='on'">
								<p class="lead fw-normal text-center">Or sign in with</p>
								<div class="d-flex align-items-center justify-content-center  mt-20">
									<button type="button" class="btn mx-1">
										<i class="bi bi-facebook"></i>
									</button>
									<GoogleLogin :callback="callback" :buttonConfig="{type: 'standard', size: 'medium', text: 'signin_with'}" v-if="google_enable=='on'" ></GoogleLogin>
								</div>
							</div>
							<p class="small text-center mt-20 mb-0">Don't have an account? <router-link :to="{ name: 'Register' }" class="link-info">Sign up now</router-link></p>
							
						</div>
					</div>
				</div>
			</section>
			<!-- Main Content Ends -->
		</div>
	</div>
</template>

<script >
import { ref, reactive,onMounted } from 'vue';
import axios from 'axios';

import jwtDecode from 'jwt-decode';
import { useRouter } from 'vue-router';
import { UserStore } from '@/store/UserStore';

import { googleAuthCodeLogin } from "vue3-google-login";
import { googleTokenLogin } from "vue3-google-login";
import { googleSdkLoaded } from "vue3-google-login";
import { decodeCredential } from 'vue3-google-login';

export default{
	
	/* 	mounted(){
			 

		},
 */

	setup(){
		const router = useRouter();
			const store = UserStore();
			let google_enable = ref('');
			let error = ref('');
			const form = ref({

				email: '',
				password: ''

			});



			const handleLogin = async () => {
				await axios.post('/api/login', {

					email: form.value.email,
					password: form.value.password,
				}).then(res => {
					if (res.data.access_token) {

						store.setToken('Bearer ' + res.data.access_token);

						router.push({ name: "MyAccount" });

					} else {
						error.value = res.data.message;
					}


				}).catch(err => {
					error.value = "Email or Password is incorrect!";
					error.value = res.error;
				});

				store.login(form.value.email, form.value.password);

			}

			onMounted(()=>{
				axios.get('/api/social_settings').then( response =>{
					console.log(response.data.data.google_login_enable);
                    google_enable.value = response.data.data.google_login_enable;
                });
			})



			
//google login setup 

			const callback = (response) => {
			// decodeCredential will retrive the JWT payload from the credential
			const userData = decodeCredential(response.credential)
			console.log("Handle the userData", userData)
						console.log(response);
			 axios.post('/api/google_auth_login', {

			first_name: userData.given_name,
			last_name: userData.family_name,
			google_avatar: userData.picture,
			email: userData.email,
			
			
			}).then(res => {
				  
				 axios.post('/api/login', {

					email: res.data.email,
					password: res.data.password,
				}).then( newres => {
					if (newres.data.access_token) {

						store.setToken('Bearer ' + newres.data.access_token);
						// console.log(res.data)
						// console.log("new data " + newres.data)
						store.login(res.data.email, res.data.password);
						router.push({ name: "MyAccount" });

					} else {
						error.value = res.data.message;
					}


				})

				
			}); 
			

					} 
			return {
				router,
				store,
				error,
				form,
				handleLogin,
				callback,
				google_enable
				
			}
	}
}


/* const callback = (response) => {
  if(response.credential) {
const	userData = decodeCredential(response.credential)
    console.log("Call the endpoint which validates authorization code",userData)
  } else {
	const userData = decodeCredential(response.credential)
    console.log("Call the endpoint which validates authorization code",userData)
  }
} */

/* const callback = (response) => {
  // decodeCredential will retrive the JWT payload from the credential
  const userData = decodeCredential(response.credential)
  console.log("Handle the userData", userData)
}  */

/* const login = (response) => {
  googleAuthCodeLogin().then((response) => {
	const userData = decodeCredential(response.credential)
  console.log("Handle the userData", userData)
  })
} */
/* const googleBtnClick=()=> {

        document.getElementById("googlehidden").click();
    } */
/* const login = () => {
  googleAuthCodeLogin().then((response) => {
    console.log("Handle the response", response)
  })
}

 */


</script>
<style>
.login-box .site-btn{
	width:100%;
}
.login-box h1 {
	font-size: 24px;
	position:relative;
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
