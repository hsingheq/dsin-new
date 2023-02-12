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
				<!-- Top Wallet Starts-->
				<div class="d-flex text-center mb-2">
					<div class="card">
						<div class="card-body">
							<div class="row d-block d-flex">
								<div class="d-flex align-items-center">
									<div class="rounded me-4">
										<i class="bi bi-wallet" style="font-size: 24px;"></i>
									</div>
									<div class="">
										<h4>Wallet Details</h4>
										<h3 class="fw-extrabold mb-1 text-success">345,678</h3>
										<p class="fw-extrabold mb-1">Your wallet balance</p>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- Top Wallet Ends-->
				<!-- Add Money Form Starts -->
				<div class="card mt-4">
					<div class="card-header">
						Add Money
					</div>
					<div class="card-body">
						<form>
							<div class="form-outline my-2 mb-4">
								<label class="form-label" for="password">Enter Amount to be Added in wallet (RM)<span class="text-danger">*</span></label>
								<input type="text" name="wallet-balance" value="" class="form-control" placeholder="Enter Amount" />
							</div>							
							<div class="text-lg-start mt-4 pt-2">
								<button type="button" class="site-btn">Add Money</button>
							</div>
						</form>
					</div>
				</div>
				<!-- Add Money Form Ends -->
				<!-- Wallet history table starts -->
				<div class="card mt-4 table-card">
					<div class="card-header">
						Wallet Transactions
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th>Reference</th>
									<th>Amount</th>
									<th>Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Added By Customer</td>
									<td>RM 500.00</td>
									<td>24 Jan, 2023 11:30:32</td>
									<td><span class="badge bg-warning">Pending</span></td>
									<td>
										<a href="" class="badge bg-primary">View</a>
									</td>
								</tr>
								<tr>
									<td>Added By Admin</td>
									<td>RM 200.00</td>
									<td>24 Jan, 2023 11:30:32</td>
									<td><span class="badge bg-success">Completed</span></td>
									<td>
										<a href="" class="badge bg-primary">View</a>
									</td>
								</tr>
								<tr>
									<td>Added By Customer</td>
									<td>RM 100.00</td>
									<td>24 Jan, 2023 11:30:32</td>
									<td><span class="badge bg-danger">Falied</span></td>
									<td>
										<a href="" class="badge bg-primary">View</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Wallet history table Ends -->	
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
     
      UserMenu
       
   }

</script>



<style>

</style>