<style>
.cart-section .cart-table {
	overflow: hidden;
	margin-bottom: 0;
}

.cart-section .cart-table thead th {
	border-bottom-width: 1px;
	font-weight: 600;
	color: #212529;
	text-transform: uppercase;
	font-size: 15px;
	border-top: 0;
	text-align: center;
	border-bottom: 1px solid #eff2f7 !important;
	padding: 12px;
	background-color: #eff2f7;
}

.cart-section tbody tr td {
	vertical-align: middle;
	color: #212529;
	border-top: 0;
	border-bottom: 1px solid #c7c7c5 !important;
	text-align: center;
	min-width: 175px;
}
.cart-table tbody tr td a {
    color: #7e7e7e;
	white-space: nowrap;
    font-weight: 400;
    font-size: 14px;
    text-transform: capitalize;
    margin-bottom: 0;
    display: inline-block;
}
.cart-table tbody tr td a.remove-cart-porduct {
	font-size: 20px;
    font-weight: bold;
    margin-right: 10px;
}
.cart-section tbody tr td a img {
    height: 80px;
}
.cart-section tbody tr td .mobile-cart-content {
    display: none;
    justify-content: center;
    margin-top: 10px;
}
.cart-section tbody tr td h2 {
    font-size: 20px;
    color: var(--color-primary);
    font-weight: 400;
}
.cart-section tbody tr td .qty-box .input-group {
    display: block;
}
.cart-section tbody tr td .qty-box .input-group .form-control {
    width: 75px;
    margin: 0 auto;
    text-align: center;
    padding: 5px;
    height: 50px;
}
.cart-section .left-side-button {
    display: flex;
    align-items: center;
}
.cart-section .cart-checkout-section {
    margin-top: 30px;
}
.cart-section .cart-checkout-section .checkout-button {
    text-align: right;
}
.cart-section .cart-checkout-section .cart-checkout-box {
    background-color: #eff2f7;
    border-radius: 10px;
    overflow: hidden;
    padding: 0;
}
.cart-section .cart-checkout-section .cart-checkout-box .cart-box-details .total-details .top-details {
    border-bottom: 1px solid #c7c7c5;
    padding: 22px;
    margin-bottom: 0;
}
.cart-section .cart-checkout-section .cart-checkout-box .cart-box-details .total-details .bottom-details a {
    background-color: #0163d2;
    background-color: var(--color-primary);
    width: 100%;
    display: block;
    padding: 12px 0;
    text-align: center;
    color: #fff;
    font-weight: 500;
    letter-spacing: 1.2px;
}
</style>
<template>
	<!-- Breadcrumbs Starts -->
	<breadcrumb v-bind:page_name="page_name"> </breadcrumb>
	<!-- Breadcrumbs Ends -->
	<!-- Cart Section Starts-->
	<section class="pb-50 cart-section">
		<div class="container">
			<div class="row">
				<!-- Cart Item Row Starts-->
				<div class="col-sm-12">
					<div class="table-responsive mt-4">
						<table class="table cart-table">
							<thead>
								<tr class="table-head">
									<th scope="col">image</th>
									<th scope="col">product name</th>
									<th scope="col">price</th>
									<th scope="col">quantity</th>
									<th scope="col">total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<a href="javascript:void(0)" class="remove-cart-porduct">
											<i class="bi bi-x"></i>
										</a>
										<a href="javascript:void(0)">
											<img src="https://vue.pixelstrap.com/voxo/_nuxt/img/3.4faefb8.jpg" alt="">
										</a>
									</td>
									<td>
										<a href="/voxo/product/product_left_sidebar/23" class="">Eggplant</a>
										<div class="mobile-cart-content row">
											<div class="col">
												<div class="qty-box">
													<div class="input-group">
														<input type="number" name="quantity" min="1" max="23" value="8"
															class="form-control input-number">
													</div>
												</div>
											</div>
											<div class="col">
												<h2> $337.60 </h2>
											</div>
											
										</div>
									</td>
									<td>
										<h2>$42.20</h2>
									</td>
									<td>
										<div class="qty-box">
											<div class="input-group">
												<input type="number" name="quantity" min="1" max="23"
													value="8" class="form-control input-number">
											</div>
										</div>
									</td>
									<td>
										<h2 class="td-color"> $337.60 </h2>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Cart Item Row Ends-->
				<!-- Continue Button Row Starts-->
				<div class="col-12 mt-md-5 mt-4">
					<div class="row">
						<div class="col-sm-7 col-5 order-1">
							<div class="left-side-button text-end d-flex d-block justify-content-end">
								<a href="javascript:void(0)" class="text-decoration-underline theme-color d-block text-capitalize">clear all items</a>
							</div>
						</div>
						<div class="col-sm-5 col-7">
							<div class="left-side-button float-start">
								<a href="/voxo/home/fashion_demo" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
									<i class="fas fa-arrow-left"></i> Continue Shopping </a>
							</div>
						</div>
					</div>
				</div>
				<!-- Continue Button Row Ends-->
				<!--Checkout Section Starts-->
				<div class="cart-checkout-section">
					<div class="row g-4">
						<div class="col-lg-4 col-sm-6">
							<div class="promo-section">
								<form class="row g-3">
									<div class="col-7">
										<input type="text" id="number" placeholder="Coupon Code" class="form-control">
									</div>
									<div class="col-5">
										<button class="btn btn-solid-default rounded btn"> Apply Coupon </button>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="checkout-button">
								<a href="javascript:void(0)" class="btn btn-solid-default btn fw-bold"> Check Out <i class="fas fa-arrow-right ms-1"></i>
								</a>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="cart-checkout-box">
								<div class="cart-box-details">
									<div class="total-details">
										<div class="top-details">
											<h3>Cart Totals</h3>
											<h6> Total MRP <span>$338</span>
											</h6>
											<h6> Coupon Discount <span>-$25.00</span>
											</h6>
											<h6> Convenience Fee <span>
													<del>$25.00</del>
												</span>
											</h6>
										</div>
										<div class="bottom-details">
											<a href="/voxo/page/checkout" class="">Process Checkout</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--Checkout Section Ends-->
			</div>

		</div>
	</section>
	<!-- Cart Section Ends-->
</template>

<script>
import { ref, reactive } from "vue";
import axios from "axios";
import { useRoute, useRouter } from "vue-router";
import { UserStore } from "@/store/UserStore";
import { useShoppingStore } from "@/store/CartStore";
import { mapState } from "pinia";
import Loading from "@/layouts/partials/loaderComponent.vue";
import breadcrumb from "@/layouts/partials/breadCrumbComponent.vue";
const base_url = import.meta.env.VITE_MY_ENV_VARIABLE;
export default {
	created() {
		this.getCartItems();
	},

	computed: {
		...mapState(useShoppingStore, ["countCartItems"]),
	},
	data() {
		return {
			cartItems: [],
			base_url,
			loading: false,
		};
	},
	methods: {
		async getCartItems() {
			this.loading = true;
			try {
				await axios
					.post("/api/getCartItems", {
						user_id: 2,
					})
					.then((res) => {
						this.cartItems = res.data.response;
					});
			} catch (error) {
				console.log(error);
			} finally {
				this.loading = false;
			}
		},
	},

	setup() {
		const page_name = ref("Cart");
		const Cartdata = useShoppingStore();

		return {
			page_name,
			Cartdata,
		};
	},
	components: {
		breadcrumb,
		Loading,
	},
};
</script>
