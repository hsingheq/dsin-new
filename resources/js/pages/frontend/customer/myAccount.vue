<template>
	<div>

		<loaderComponent />

		<!-- breadcrubms -->
		<breadcrumb v-bind:page_name="page_name">
		</breadcrumb>

		<section class="pb-50">
			<div class="container">
				<div class="row">
					<!-- Left Box Starts -->
					<div class="col-md-4 col-lg-4 col-xl-4">
						<UserMenu />

					</div>
					<!-- Left Box Ends -->
					<div class="col-md-8 col-lg-8 col-xl-8">
						<div class="d-flex justify-content-around text-center mb-2 users-details-boxes">
							<div class="card">
								<div class="card-body">
									<div class="row d-block d-flex align-items-center">
										<div class="col-12 text-center d-flex align-items-center">
											<div class="rounded me-4">
												<i class="bi bi-wallet"></i>
											</div>
											<div class="">
												<h5>Wallet Balance</h5>
												<h5 class="fw-extrabold mb-1">
													<currencyformat :value="balance" />
												</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="row d-block d-flex align-items-center">
										<div class="col-12 text-center d-flex align-items-center justify-content-center">
											<div class="rounded me-4">
												<i class="bi bi-bar-chart-fill"></i>
											</div>
											<div class="">
												<h5>Total Orders</h5>
												<h5 class="fw-extrabold mb-1">345,678</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Recent Transactions -->
						<div class="card mt-4 table-card">
							<div class="card-header">
								Recent Transactions
							</div>
							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											<th>Order ID</th>
											<th>Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="">1</a></td>
											<td>24 Jan, 2023 11:30:32</td>
											<td><span class="badge bg-warning">Pending</span></td>
											<td>
												<a href="" class="badge bg-primary">View</a>
												<a href="" class="badge bg-danger">Cancel</a>
											</td>
										</tr>
										<tr>
											<td><a href="">2</a></td>
											<td>24 Jan, 2023 11:30:32</td>
											<td><span class="badge bg-primary">Processing</span></td>
											<td>
												<a href="" class="badge bg-primary">View</a>
											</td>
										</tr>

										<tr>
											<td><a href="">3</a></td>
											<td>24 Jan, 2023 11:30:32</td>
											<td><span class="badge bg-success">Delievered</span></td>
											<td>
												<a href="" class="badge bg-primary">View</a>
											</td>
										</tr>
										<tr>
											<td><a href="">4</a></td>
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
						<!-- Recent Transactions Ends -->
					</div>
				</div>
			</div>
		</section>
	</div>
</template>

<script >
import { ref, onMounted, reactive } from 'vue';
import axios from 'axios';
import { useRoute, useRouter } from 'vue-router';
import { UserStore } from '@/store/UserStore';
import UserMenu from '@/layouts/partials/userMenuComponent.vue';
// import breadcrumb from '../../../layouts/partials/breadCrumbComponent.vue';
import breadcrumb from '@/layouts/partials/breadCrumbComponent.vue';
import TokencheckAndLogout from '@/mixins/TokencheckAndLogout';
import loaderComponent from '../../../layouts/partials/loaderComponent.vue';
import currencyformat from "@/layouts/partials/components/currency-format.vue";
export default {
	mixins: [TokencheckAndLogout],
	components: { UserMenu, breadcrumb, currencyformat },
	async created() {
		this.TokencheckAndLogout()
		this.toggleLoader()


	},
	data() {
		return {
			isLoading: true,
			balance: '',
		}
	},
	methods: {
		toggleLoader() {
			this.isLoading = true;
			setTimeout(() => {
				this.isLoading = false;
			}, 2000);
		},
		async getBalance() {
			await axios.get("/api/transact", {
				headers: {
					Authorization: 'Bearer ' + sessionStorage.getItem('token'),
				}
			}).then(({ data }) => ([this.balance = data.balance]));
		}
	},
	created() {
		this.getBalance();
	},
	mounted() {



	},

	setup() {



		const page_name = ref('My Account');
		return {
			page_name,

		}
	},


}









</script>



<style></style>