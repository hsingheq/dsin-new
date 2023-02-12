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
					<h4>Orders</h4>
				</div>
				<div class="card table-card">
					<div class="card-body">
						<table class="table">
						<thead>
							<tr>
							<th>Order ID</th>
							<th>Amount</th>
							<th>Date</th>
							<th>Status</th>
							<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<td>
								<a href="">PO-12345</a>
							</td>
							<td>RM 500000.00</td>
							<td>24 Jan, 2023 11:30:32</td>
							<td>
								<span class="badge bg-warning">Pending</span>
							</td>
							<td>
								<a href="" class="badge bg-primary">Invoice</a>
								<a href="" class="badge bg-primary">View</a>
								<a href="" class="badge bg-danger">Cancel</a>
							</td>
							</tr>
							<tr>
							<td>
								<a href="">2</a>
							</td>
							<td>RM 400.00</td>
							<td>24 Jan, 2023 11:30:32</td>
							<td>
								<span class="badge bg-primary">Processing</span>
							</td>
							<td>
								<a href="" class="badge bg-primary">View</a>
							</td>
							</tr>
							<tr>
							<td>
								<a href="">3</a>
							</td>
							<td>RM 500.00</td>
							<td>24 Jan, 2023 11:30:32</td>
							<td>
								<span class="badge bg-success">Delievered</span>
							</td>
							<td>
								<a href="" class="badge bg-primary">View</a>
							</td>
							</tr>
							<tr>
							<td>
								<a href="">4</a>
							</td>
							<td>RM 500.00</td>
							<td>24 Jan, 2023 11:30:32</td>
							<td>
								<span class="badge bg-danger">Falied</span>
							</td>
							<td>
								<a href="" class="badge bg-primary">View</a>
							</td>
							</tr>
						</tbody>
						</table>
					</div>
					</div>
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