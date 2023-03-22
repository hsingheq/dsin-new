<!-- silence is golden -->
<template>
	<loading v-model:active="isLoading" :can-cancel="true" :on-cancel="onCancel" :is-full-page="fullPage" />
	<section class="box-plr-75">

		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="breadcrumb-wrapper">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Shop</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumbs Ends -->
	<!-- Content Starts -->
	<div class="shop-area mb-20">
		<div class="container">
			<div class="row">
				<!-- Sidebar Starts -->
				<div class="col-xl-3 col-lg-4">
					<form action="#">
						<div class="product-widget">
							<h5 class="pt-title"><span>Price</span></h5>

							<div class="widget-content widget-category-list  mt-30">
								<div class="track-container">
									<span class="range-value min">{{ minValue }} </span> <span class="range-value max">{{
										maxValue }}</span>
									<div class="track" ref="_vpcTrack"></div>
									<div class="track-highlight" ref="trackHighlight"></div>
									<button class="track-btn track1" ref="track1"></button>
									<button class="track-btn track2" ref="track2"></button>
								</div>
							</div>
						</div>

						<div class="product-widget">
							<h5 class="pt-title"><span>Product categories</span></h5>
							<div class="widget-content widget-category-list  mt-20">
								<div class="single-widget-category" v-for="category in top_categories">
									<input type="checkbox" :id="['cat-' + category.id]" name="cat-item"
										v-model="checkedCategories" @change="check($event)" :value="category.id">
									<label :for="['cat-' + category.id]">{{ category.category }} <span>({{
										category.totalProduct }})</span>
									</label>
								</div>
							</div>
						</div>
						<div class="product-widget">
							<h5 class="pt-title"><span>Choose Color</span></h5>
							<div class="widget-content product__color mt-20">
								<ul>
									<li v-for="color in colors">
										<a v-on:click="selectColor(color)"
											:class="[color.value, checkedColors == color.value ? 'active' : '',]"></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="product-widget">
							<h5 class="pt-title"><span>Choose Rating</span></h5>
							<div class="widget-content widget-category-list mt-20">
								<div class="single-widget-rating">
									<input type="checkbox" id="star-item-1" name="star-item">
									<label for="star-item-1">
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<span>(54)</span>
									</label>
								</div>
								<div class="single-widget-rating">
									<input type="checkbox" id="star-item-2" name="star-item">
									<label for="star-item-2">
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star"></i>
										<span>(37)</span>
									</label>
								</div>
								<div class="single-widget-rating">
									<input type="checkbox" id="star-item-3" name="star-item">
									<label for="star-item-3">
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										<span>(7)</span>
									</label>
								</div>
								<div class="single-widget-rating">
									<input type="checkbox" id="star-item-4" name="star-item">
									<label for="star-item-4">
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										<span>(5)</span>
									</label>
								</div>
								<div class="single-widget-rating">
									<input type="checkbox" id="star-item-5" name="star-item">
									<label for="star-item-5">
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										<span>(3)</span>
									</label>
								</div>
							</div>
						</div>
						<div class="product-widget">
							<h5 class="pt-title"><span>Choose Size</span></h5>
							<div class="widget-content widget-category-list mt-20">
								<form action="#">
									<div class="single-widget-category" v-for="sz in size">
										<input type="checkbox" :id="['size-' + sz.id]" v-model="checkedSize"
											@change="check($event)" :value="sz.value">
										<label :for="['size-' + sz.id]">{{ sz.value }} <span>({{ sz.totalProduct }}))</span>
										</label>
									</div>
								</form>
							</div>
						</div>
						<div class="product-widget mb-30">
							<h5 class="pt-title"><span>Choose Brand</span></h5>
							<div class="widget-content widget-category-list mt-20">
								<div class="single-widget-category" v-for="brand in brands">
									<input type="checkbox" id="['brand-' + brand.id]" name="brand-item"
										v-model="checkedBrand" @change="check($event)" :value="brand.id">
									<label for="['brand-' + brand.id]">{{ brand.brand }} <span>({{ brand.totalProduct
									}})</span>
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- Sidebar Ends -->
				<div class="col-xl-9 col-lg-8">
					<div class="product-lists-top mb-30">
						<div class="product__filter-wrap">
							<div class="row align-items-center">
								<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
									<div class="product__filter d-sm-flex align-items-center">
										<div class="product__result">
											<p>Showing 1-20 of 29 relults</p>
										</div>
									</div>
								</div>
								<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
									<div class="product__filter-right d-flex align-items-center justify-content-md-end">
										<div class="product__sorting product__show-no">
											<div class="nice-select" tabindex="0">
												<span class="current">10</span>
												<ul class="list">
													<li data-value="10" class="option selected" @click="pageLimit(2)">10
													</li>
													<li data-value="20" class="option" @click="pageLimit(20)">20</li>
													<li data-value="30" class="option" @click="pageLimit(30)">30</li>
													<li data-value="40" class="option" @click="pageLimit(40)">40</li>
												</ul>
											</div>
										</div>
										<div class="product__sorting product__show-position ml-20">
											<div class="nice-select" tabindex="0">
												<span class="current">Default Sorting</span>
												<ul class="list">
													<li data-value="Latest" class="option selected"
														@click="pageSorting('latest')">Latest</li>
													<li data-value="New" class="option" @click="pageSorting('new')">New</li>
													<li data-value="Up comeing" class="option"
														@click="pageSorting('up-comeing')">Up comeing</li>
												</ul>
											</div>
										</div>
										<div class="product__col ml-20">
											<ul class="nav nav-tabs" id="myTab" role="tablist">
												<li class="nav-item" role="presentation">
													<button class="nav-link active" id="FourCol-tab" data-bs-toggle="tab"
														data-bs-target="#FourCol" type="button" role="tab"
														aria-controls="FourCol" aria-selected="true">
														<i class="bi bi-grid-3x3-gap"></i>
													</button>
												</li>
												<li class="nav-item" role="presentation">
													<button class="nav-link" id="FiveCol-tab" data-bs-toggle="tab"
														data-bs-target="#FiveCol" type="button" role="tab"
														aria-controls="FiveCol" aria-selected="false">
														<i class="bi bi-list-task"></i>
													</button>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content" id="productGridTabContent">
						<div class="tab-pane fade  show active" id="FourCol" role="tabpanel" aria-labelledby="FourCol-tab">
							<div class="tp-wrapper">
								<div class="row">
									<!-- Product Item Starts -->
									<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" v-for="product in our_products.data"
										:key="product.id">
										<div class="product-item product-item-d">
											<div class="product-thumb fix">
												<div class="product-image w-img">
													<router-link :to="{ name: 'Product', params: { slug: product.slug } }" class="image">
														<img :src="product.file_name" alt="product">
													</router-link>
												</div>
											<!-- <div class="product-action">
												   <a href="#" class="icon-box" data-bs-toggle="modal" data-bs-target="#productModalId">
													   <i class="bi bi-eye"></i>
												   </a>
												   <a href="#" class="icon-box">
													   <i class="bi bi-heart"></i>
												   </a>
													   </div> -->
											</div>
											<div class="product-content">
												<h6>
													<router-link :to="{ name: 'Product', params: { slug: product.slug } }" class="image">
														{{ product.product_title }}
													</router-link>
												</h6>
												<div class="rating mb-5 mt-10 justify-content-between">
													<ul>
														<li><a href="#"><i class="bi bi-star"></i></a></li>
														<li><a href="#"><i class="bi bi-star"></i></a></li>
														<li><a href="#"><i class="bi bi-star"></i></a></li>
														<li><a href="#"><i class="bi bi-star"></i></a></li>
														<li><a href="#"><i class="bi bi-star"></i></a></li>
													</ul>
													<span>1 review</span>
												</div>
												<div class="price">
													<currencyformat :value="product.unit_price" />
												</div>
											</div>
											<div class="d-flex justify-content-between align-items-center">
												<button type="button" class="cart-btn-2 mb-10" @click="addToCart(product)">
													Add to Cart </button>
												<!-- <button type="button" class="add-wishlist-btn mb-10"> <i class="bi bi-heart"></i></button> -->
											</div>
										</div>

									</div>
									<!-- Product Item Ends -->

									<!-- Product Item Ends -->


								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="FiveCol" role="tabpanel" aria-labelledby="FiveCol-tab">
							<div class="tp-wrapper-2">
								<!-- Product Single Item Starts -->
								<div class="single-item-pd" v-for="product in our_products.data" :key="product.id">
									<div class="row align-items-center">
										<div class="col-xl-9">
											<div class="single-features-item single-features-item-df b-radius mb-20">
												<div class="row align-items-center">
													<div class="col-md-4">
														<div class="features-thum">
															<div class="features-product-image w-img">
																<a href="">
																	<img :src="product.file_name" alt="product">
																</a>
															</div>
															<div class="product-offer">
																<span class="discount">-15%</span>
															</div>
															<div class="product-action">
																<a href="#" class="icon-box" data-bs-toggle="modal"
																	data-bs-target="#productModalId">
																	<i class="bi bi-eye"></i>
																</a>
																<a href="#" class="icon-box">
																	<i class="bi bi-heart"></i>
																</a>
															</div>
														</div>
													</div>
													<div class="col-md-8">
														<div class="product-content">
															<h6>
																<a href="">{{ product.product_title }}</a>
															</h6>
															<div class="rating mb-5">
																<ul class="rating-d">
																	<li><a href="#"><i class="bi bi-star"></i></a></li>
																	<li><a href="#"><i class="bi bi-star"></i></a></li>
																	<li><a href="#"><i class="bi bi-star"></i></a></li>
																	<li><a href="#"><i class="bi bi-star"></i></a></li>
																	<li><a href="#"><i class="bi bi-star"></i></a></li>
																</ul>
																<span>1 review</span>
															</div>
															<div class="features-des">
																{{ product.product_description }}
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-3">
											<div class="product-stock mb-15">
												<h5>Availability: <span> 940 in stock</span>
												</h5>
												<h6>RM 220.00</h6>
											</div>
											<div class="stock-btn ">
												<button type="button"
													class="cart-btn-2 d-flex mb-10 align-items-center justify-content-center w-100"
													@click="addToCart(product)"> Add to Cart </button>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Pagination Starts -->
					<div class="tp-pagination text-center">
						<div class="row">
							<div class="col-xl-12">
								<div class="basic-pagination pt-30 pb-30">
									<Bootstrap5Pagination align="center" class="mb-30" :data="our_products" :limit=perPage
										:show-disabled="false" @pagination-change-page="getProducts" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import { ref } from 'vue';

import { useRoute, useRouter } from 'vue-router';
import router from '@/router';
import { UserStore } from '@/store/UserStore';
import { useShoppingStore } from '@/store/cart';
import { mapState } from 'pinia';

import axios from 'axios';
import Bootstrap5Pagination from 'laravel-vue-pagination';
import currencyformat from "@/layouts/partials/components/currency-format.vue";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/css/index.css';

// import '../../asset/js/swiper.js';
// import '../../asset/css/swiper.css';

const base_url = import.meta.env.VITE_MY_ENV_VARIABLE;


export default {
	components: {
		Loading,
		Bootstrap5Pagination,
		currencyformat
	},
	computed: {
		...mapState(UserStore, ['authUser'])

	},
	name: 'Vue Price Range',
	el: '#app',
	data() {
		//const cartAction = useShoppingStore()
		return {
			isLoading: false,
			fullPage: true,
			currentPage: 1,
			rows: 2,
			perPage: 2,
			sorting: 'latest',
			base_url,
			top_categories: [],
			colors: [],
			size: [],
			brands: [],
			checkedCategories: [],
			checkedColors: '',
			checkedSize: [],
			checkedBrand: [],
			best_selling_products: [],
			currency: '',
			user_id: '',
			loading: false,
			data: [],
			cart: null,

			min: 500,
			max: 10000,
			minValue: 4000,
			maxValue: 6000,
			step: 5,
			totalSteps: 0,
			percentPerStep: 1,
			trackWidth: null,
			isDragging: false,
			pos: {
				curTrack: null
			},

			our_products: {
				type: Object,
				default: null
			},
		}

	},

	methods: {
		pageLimit(perPage) {
			this.perPage = perPage;
			this.getProducts();
		},
		pageSorting(sorting) {
			this.sorting = sorting;
			this.getProducts();
		},
		async getProducts(page = 1) {
			this.isLoading = true;
			const params = {
				page: page,
				perPage: this.perPage,
				sorting: this.sorting,
				categories: this.checkedCategories,
				checkedSize: this.checkedSize,
				checkedColors: this.checkedColors,
				checkedBrand: this.checkedBrand,
			};

			axios.get('api/our_products', { params }).then((response) => {
				this.our_products = response.data.data;
				this.isLoading = false;
			});
		},

		getCategories() {
			axios.get('api/get_top_categories').then((response) => {
				this.top_categories = response.data.data;
			});
		},

		getAtribute() {
			axios.get('api/getAtribute').then((response) => {
				// console.log(response);
				this.colors = response.data.response.colors;
				this.size = response.data.response.size;
				this.brands = response.data.response.brands;
			});
		},
		selectColor(color) {
			this.checkedColors = color.value;
			this.getProducts();
		},
		check() {
			this.getProducts();
		},
		rows() {
			return this.items.length
		},

		pageChange(page, range) {
			console.log(page, range);
		},
		addToCart(product) {
			useShoppingStore().addToCart(product)
		},
		checkCardItem(product) {

		},
		moveTrack(track, ev) {

			let percentInPx = this.getPercentInPx();

			let trackX = Math.round(this.$refs._vpcTrack.getBoundingClientRect().left);
			let clientX = ev.clientX;
			let moveDiff = clientX - trackX;

			let moveInPct = moveDiff / percentInPx
			// console.log(moveInPct)

			if (moveInPct < 1 || moveInPct > 100) return;
			let value = (Math.round(moveInPct / this.percentPerStep) * this.step) + this.min;
			if (track === 'track1') {
				if (value >= (this.maxValue - this.step)) return;
				this.minValue = value;
			}

			if (track === 'track2') {
				if (value <= (this.minValue + this.step)) return;
				this.maxValue = value;
			}

			this.$refs[track].style.left = moveInPct + '%';
			this.setTrackHightlight()

		},
		mousedown(ev, track) {

			if (this.isDragging) return;
			this.isDragging = true;
			this.pos.curTrack = track;
		},

		touchstart(ev, track) {
			this.mousedown(ev, track)
		},

		mouseup(ev, track) {
			if (!this.isDragging) return;
			this.isDragging = false
		},

		touchend(ev, track) {
			this.mouseup(ev, track)
		},

		mousemove(ev, track) {
			if (!this.isDragging) return;
			this.moveTrack(track, ev)
		},

		touchmove(ev, track) {
			this.mousemove(ev.changedTouches[0], track)
		},

		valueToPercent(value) {
			return ((value - this.min) / this.step) * this.percentPerStep
		},

		setTrackHightlight() {
			this.$refs.trackHighlight.style.left = this.valueToPercent(this.minValue) + '%'
			this.$refs.trackHighlight.style.width = (this.valueToPercent(this.maxValue) - this.valueToPercent(this.minValue)) + '%'
		},

		getPercentInPx() {
			let trackWidth = this.$refs._vpcTrack.offsetWidth;
			let oneStepInPx = trackWidth / this.totalSteps;
			// 1 percent in px
			let percentInPx = oneStepInPx / this.percentPerStep;

			return percentInPx;
		},

		setClickMove(ev) {
			let track1Left = this.$refs.track1.getBoundingClientRect().left;
			let track2Left = this.$refs.track2.getBoundingClientRect().left;
			// console.log('track1Left', track1Left)
			if (ev.clientX < track1Left) {
				this.moveTrack('track1', ev)
			} else if ((ev.clientX - track1Left) < (track2Left - ev.clientX)) {
				this.moveTrack('track1', ev)
			} else {
				this.moveTrack('track2', ev)
			}
		}
	},

	mounted() {
		this.checkedCategories = [this.$route.params.category];
		this.getProducts();
		this.getCategories();
		this.getAtribute();

		this.totalSteps = (this.max - this.min) / this.step;

		// percent the track button to be moved on each step
		this.percentPerStep = 100 / this.totalSteps;
		// console.log('percentPerStep', this.percentPerStep)

		// set track1 initilal
		document.querySelector('.track1').style.left = this.valueToPercent(this.minValue) + '%'
		// track2 initial position
		document.querySelector('.track2').style.left = this.valueToPercent(this.maxValue) + '%'
		// set initila track highlight
		this.setTrackHightlight()

		var self = this;

		['mouseup', 'mousemove'].forEach(type => {
			document.body.addEventListener(type, (ev) => {
				// ev.preventDefault();
				if (self.isDragging && self.pos.curTrack) {
					self[type](ev, self.pos.curTrack)
				}
			})
		});

		['mousedown', 'mouseup', 'mousemove', 'touchstart', 'touchmove', 'touchend'].forEach(type => {
			document.querySelector('.track1').addEventListener(type, (ev) => {
				ev.stopPropagation();
				self[type](ev, 'track1')
			})

			document.querySelector('.track2').addEventListener(type, (ev) => {
				ev.stopPropagation();
				self[type](ev, 'track2')
			})
		})

		// on track clik
		// determine direction based on click proximity
		// determine percent to move based on track.clientX - click.clientX
		document.querySelector('.track').addEventListener('click', function (ev) {
			ev.stopPropagation();
			self.setClickMove(ev)

		})

		document.querySelector('.track-highlight').addEventListener('click', function (ev) {
			ev.stopPropagation();
			self.setClickMove(ev)

		})
	},



}
</script>
<style>
.product__color ul li a.active {
	box-shadow: 0 0 0 1px var(--color-primary), inset 0 0 0 2px #fff;
}

.range-value {
	position: absolute;
	top: -2rem;
}

.range-value.min {
	left: 0;
}

.range-value.max {
	right: 0;
}

.track-container {
	width: 100%;
	position: relative;
	cursor: pointer;
	height: 0.5rem;
}

.track,
.track-highlight {
	display: block;
	position: absolute;
	width: 100%;
	height: 0.5rem;
}

.track {
	background-color: #ddd;
}

.track-highlight {
	background-color: #0657B7;
	z-index: 2;
}

.track-btn {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	outline: none;
	cursor: pointer;
	display: block;
	position: absolute;
	z-index: 2;
	width: 1.5rem;
	height: 1.5rem;
	top: calc(-50% - 0.25rem);
	margin-left: -1rem;
	border: none;
	background-color: #0657B7;
	-ms-touch-action: pan-x;
	touch-action: pan-x;
	transition: box-shadow .3s ease-out, background-color .3s ease, -webkit-transform .3s ease-out;
	transition: transform .3s ease-out, box-shadow .3s ease-out, background-color .3s ease;
	transition: transform .3s ease-out, box-shadow .3s ease-out, background-color .3s ease, -webkit-transform .3s ease-out;
}
</style>