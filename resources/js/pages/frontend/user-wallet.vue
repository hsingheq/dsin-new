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
				<userWallet />
			</div>	
		</div>
	</div>
</section>	
   </div>
</template>

<script setup>
import {ref, onMounted} from 'vue';
import axios from 'axios';
import { useRoute, useRouter } from 'vue-router';
import { UserStore } from '../../store/UserStore';
import UserMenu from '../../layouts/partials/userMenuComponent.vue';
import userWallet from '@/layouts/partials/components/wallet/manage-wallet.vue';
const router = useRouter();
const store = UserStore();

let name = localStorage.getItem('name');
function logout(){
store.removeEmail('email');
 /*    localStorage.removeItem('email');
   localStorage.getItem('name'); */
    router.push({name:'/'});
}

   
   components : {
      UserMenu,
	  userWallet
   }

</script>
<style>
</style>