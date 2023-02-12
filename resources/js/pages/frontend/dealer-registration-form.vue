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
							<li class="breadcrumb-item active" aria-current="page">Dealer Registration</li>
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
			<!-- Left Box Ends -->
			<div class="col-md-8 col-lg-8 col-xl-8 offset-md-2">
				<div class="page-heading">
					<h4>Dealer Registration Form</h4>
				</div>
				<!-- Change password form starts -->
				<form @submit.prevent="handleChangePassword">
					<!-- Email input -->
					<div class="form-outline my-4 row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="email">Email</label>
							<input type="email" readonly v-model="form.email" id="email" name="email" class="form-control" />
						</div>	
					</div>
					<!-- Registration Type -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label row" for="">Registration Type</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="registration_type_individual" name="registration_type" value="individual">
								<label class="form-check-label" for="registration_type_individual">Individual</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" id="registration_type_company" name="registration_type" value="company">
								<label class="form-check-label" for="registration_type_company">Company</label>
							</div>
						</div>	
					</div>
					<!-- Personal Information Starts-->
					<div class="form-outline row my-4 mb-0">
						<div class="col-md-12">
							<h5>Personal / Company Information</h5>
							<hr>
						</div>	
					</div>
					<!-- Name input -->
					<div class="form-outline mb-3 row">
						<div class="col-md-6">
							<label class="form-label" for="first_name">First Name</label>
							<input type="text" id="first_name" name="first_name" v-model="form.first_name" class="form-control" />	
						</div>
						<div class="col-md-6">
							<label class="form-label" for="last_name">Last Name</label>
							<input type="text" id="last_name" name="last_name" v-model="form.last_name" class="form-control" placeholder="" />	
						</div>		
					</div>
					<!-- Gender -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label row" for="">Gender</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="gender-male" value="male">
								<label class="form-check-label" for="gender-male">Male</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="gender" id="gender-female" value="female">
								<label class="form-check-label" for="gender-female">Female</label>
							</div>
						</div>	
					</div>
					<!-- NRIC -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="nric_no">NRIC No</label>
							<input type="text" v-model="form.nric_no" id="nric_no" name="nric_no" class="form-control" />
						</div>
					</div>
					<!-- Profile Picture input -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="profile_pic">NRIC Front Picture</label>
							<input type="file" id="nric_front" name="nric_front" class="form-control" />
						</div>	
					</div>
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="profile_pic">NRIC Back Picture</label>
							<input type="file" id="nric_back" name="nric_back" class="form-control" />
						</div>	
					</div>
					<!-- Mobile -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="mobile">Mobile</label>
							<input type="text" v-model="form.mobile" id="mobile" name="mobile" class="form-control" />
						</div>
					</div>
					<!-- Correspondence Address -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="address">Correspondence Address</label>
							<textarea v-model="form.address" id="address" name="address" class="form-control"></textarea>
						</div>
					</div>
					<!-- Occupation -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="occupation">Occupation</label>
							<input type="text" v-model="form.occupation" id="occupation" name="occupation" class="form-control">
						</div>
					</div>
					<!-- Company Name -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="company_name">Company Name</label>
							<input type="text" v-model="form.company_name" id="company_name" name="company_name" class="form-control" />
						</div>
					</div>
					<!-- Company Registration No -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="company_registration_no">Company Registration No</label>
							<input type="text" v-model="form.company_registration_no" id="company_registration_no" name="company_registration_no" class="form-control" />
						</div>
					</div>
					<!-- Company Correspondence Address -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="company_address">Company Correspondence Address</label>
							<textarea v-model="form.company_address" id="company_address" name="company_address" class="form-control"></textarea>
						</div>
					</div>
					<!-- Company Telephone -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="company_telephone">Company Telephone</label>
							<input type="text" v-model="form.company_telephone" id="company_telephone" name="company_telephone" class="form-control" />
						</div>
					</div>
					<!-- Company SSM Certificate of Incorporation -->
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label" for="company_ssm_certificate">Please upload company SSM Certificate of Incorporation</label>
							<input type="file" id="company_ssm_certificate" name="company_ssm_certificate" class="form-control" />
						</div>	
					</div>
					<!-- Appointment Starts -->
					<div class="form-outline row my-4 mb-0">
						<div class="col-md-12">
							<h5>APPOINTMENT</h5>
							<hr>
							<p>Please let us know when it's the best time we can arrange our sales team to meet you</p>
						</div>	
					</div>
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label row mb-1" for="company_ssm_certificate">First Preferred Date/Time</label>
							<div class="form-check-inline">
								<input type="date" id="company_ssm_certificate" name="company_ssm_certificate" class="form-control" />
							</div>
							<div class="form-check form-check-inline">
								<input type="time" id="company_ssm_certificate" name="company_ssm_certificate" class="form-control" />
							</div>
						</div>	
					</div>
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label row mb-1" for="company_ssm_certificate">Second Preferred Date/Time</label>
							<div class="form-check-inline">
								<input type="date" id="company_ssm_certificate" name="company_ssm_certificate" class="form-control" />
							</div>
							<div class="form-check form-check-inline">
								<input type="time" id="company_ssm_certificate" name="company_ssm_certificate" class="form-control" />
							</div>
						</div>	
					</div>
					<!-- Appointment Ends -->
					<!-- Declaration Starts -->
					<div class="form-outline row my-4 mb-0">
						<div class="col-md-12">
							<h5>DECLARATION & NOTES</h5>
							<hr>
						</div>	
					</div>
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label row mb-1" for="company_ssm_certificate">Notes / Comments:</label>
							<p>Please feel free to leave us a note / comment in regards to this registration application</p>
							<textarea id="notes" name="notes" class="form-control"></textarea>
						</div>	
					</div>
					<div class="form-outline row mb-3">
						<div class="col-md-12">
							<label class="form-label row mb-1" for="company_ssm_certificate">
								We / I hereby declare that the details furnished above are true and correct to the best of my / our knowledge and belief and we/ I undertake to inform DSASB of any changes therein, immediately. In case any of the above information is found to be false or untrue or misleading or misrepresenting, we/ I am aware that we/ I may be held liable for it.
							</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="acceptance" id="acceptance" value="yes">
								<label class="form-check-label" for="acceptance">Yes, and proceed to submit</label>
							</div>
						</div>	
					</div>
					<!-- Declaration Ends -->
					<div class="text-lg-start mt-4 pt-2 row">
						<div class="col-md-12">
							<button type="submit" class="site-btn">Update</button>
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