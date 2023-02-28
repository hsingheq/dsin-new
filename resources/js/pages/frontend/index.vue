<template>
	<div>

		<div class="wrapper">
			<!-- Main Content Starts -->

			<!-- Slider Starts -->
			<MainSlider />
			<!-- Slider Ends -->


			<section class="pt-70 pb-20">
				<div class="container-fluid px-5">
					<div class="row g-0">
						<!-- Right Content Sidebar-->
						<div class="col-lg-9 order-md-2">
							<!-- Section Top Categories Starts -->
							<TopCategories />
							<NewArrivals />
							<MainOffers1 />
							<BestSellers />
							<MainOffers2 />
						</div>
						<!-- Right Content Sidebar Ends-->
						<!-- Left Content Sidebar-->
						<div class="col-lg-3 order-md-1">
							<DealsoftheWeek />
							<LeftOffer1 />
							<infoBoxes />
							<LatestBlog />
							<LeftOffer2 />
						</div>
						<!-- Left Content Sidebar Ends-->
					</div>
				</div>
			</section>


			<!-- Main Content Ends -->
		</div>


	</div>
</template>

<script>
import { ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import router from '@/router';
import { UserStore } from '@/store/UserStore';
import { useShoppingStore } from '@/store/CartStore';
import { mapState } from 'pinia';
import Loading from '@/layouts/partials/loaderComponent.vue';
import MainSlider from '@/layouts/partials/home/mainSlider.vue';
import TopCategories from '@/layouts/partials/home/top-categories.vue';
import DealsoftheWeek from '@/layouts/partials/home/deals-of-the-week.vue';
import LeftOffer1 from '@/layouts/partials/home/left-side-offer-1.vue';
import infoBoxes from '@/layouts/partials/home/info-boxes.vue';
import LatestBlog from '@/layouts/partials/home/latest-blogs.vue';
import LeftOffer2 from '@/layouts/partials/home/left-side-offer-2.vue';
import NewArrivals from '@/layouts/partials/home/new-arrivals-products-list.vue';
import MainOffers1 from '@/layouts/partials/home/main-offers-1.vue';
import MainOffers2 from '@/layouts/partials/home/main-offers-2.vue';
import BestSellers from '@/layouts/partials/home/best-sellers-products-list.vue';

import '../../asset/js/swiper.js';
import '../../asset/css/swiper.css';

const base_url = import.meta.env.VITE_MY_ENV_VARIABLE;
export default {
	name: 'login',
	components: {
		MainSlider,
		TopCategories,
		DealsoftheWeek,
		LeftOffer1,
		infoBoxes,
		LatestBlog,
		LeftOffer2,
		NewArrivals,
		MainOffers1,
		MainOffers2,
		BestSellers
	},
	computed: {
		...mapState(UserStore, ['authUser'])
		/* ...mapState('UserStore',['authUser']) */
	},
	data() {
		return {
			base_url,
			//top_categories: [],
			our_products: [],
			best_selling_products: [],
			currency: '',
			user_id: '',
			loading: false


		}
	},
	created() {
		this.productSlider();
		this.productSlider2();
		this.productSlider3();
		this.productSlider4();
	},

	mounted() {

		// GETTING PRODUCTS
		axios.get('/api/our_products').then(({ data }) => {
			this.our_products = data.data.data;
			this.currency = data.currency;
			console.log(data.data.data);
		});


		axios.get('/api/best_selling_products').then(({ data }) => {
			this.best_selling_products = data.data.data;
			this.currency = data.currency;
			//console.log(data.data);
		});

		//valid user


	},
	methods: {
		productSlider() {
			jQuery(function () {
				if (jQuery(".product-slider").length > 0) {
					let testimonialTwo = new Swiper('.product-slider', {
						slidesPerView: 1,
						spaceBetween: 20,
						// direction: 'vertical',
						loop: true,
						observer: true,
						observeParents: true,
						autoplay: {
							delay: 6000,
						},

						// If we need pagination
						pagination: {
							el: '.swiper-pagination',
							clickable: true,
						},
						// Navigation arrows
						navigation: {
							nextEl: '.bs-button-next',
							prevEl: '.bs-button-prev',
						},

						// And if we need scrollbar
						scrollbar: {
							el: '.swiper-scrollbar',
						},
						breakpoints: {
							550: {
								slidesPerView: 2,
							},
							768: {
								slidesPerView: 3,
							},
							1200: {
								slidesPerView: 4,
							}
						}
					});
				}
			});
		},

		productSlider2() {
			jQuery(document).ready(function () {
				if (jQuery(".product-slider-2").length > 0) {
					let testimonialTwo = new Swiper('.product-slider-2', {
						slidesPerView: 1,
						spaceBetween: 20,
						// direction: 'vertical',
						loop: true,
						observer: true,
						observeParents: true,
						autoplay: false,
						// If we need pagination
						pagination: {
							el: '.swiper-pagination',
							clickable: true,
						},
						// Navigation arrows
						navigation: {
							nextEl: '.bs2-button-next',
							prevEl: '.bs2-button-prev',
						},

						// And if we need scrollbar
						scrollbar: {
							el: '.swiper-scrollbar',
						},
						breakpoints: {
							550: {
								slidesPerView: 2,
							},
							768: {
								slidesPerView: 3,
							},
							1200: {
								slidesPerView: 4,
							}
						}
					});
				}
			});
		},

		productSlider3() {
			jQuery(document).ready(function () {
				if (jQuery(".product-slider-3").length > 0) {
					let testimonialTwo = new Swiper('.product-slider-3', {
						slidesPerView: 1,
						spaceBetween: 30,
						// direction: 'vertical',
						loop: true,
						autoplay: {
							delay: 6000,
						},

						// If we need pagination
						pagination: {
							el: '.swiper-pagination',
							clickable: true,
						},
						// Navigation arrows
						navigation: {
							nextEl: '.bs3-button-next',
							prevEl: '.bs3-button-prev',
						},

						// And if we need scrollbar
						scrollbar: {
							el: '.swiper-scrollbar',
						},
						breakpoints: {
							550: {
								slidesPerView: 2,
							},
							768: {
								slidesPerView: 3,
							},
							1200: {
								slidesPerView: 4,
							}
						}
					});
				}
			});
		},

		productSlider4() {
			jQuery(document).ready(function () {
				if (jQuery(".clients-slider").length > 0) {
					let testimonialTwo = new Swiper('.clients-slider', {
						slidesPerView: 1,
						spaceBetween: 30,
						// direction: 'vertical',
						loop: true,
						autoplay: {
							delay: 6000,
						},

						// If we need pagination
						pagination: {
							el: '.swiper-pagination',
							clickable: true,
						},
						// Navigation arrows
						navigation: {
							nextEl: '.bs-button-next',
							prevEl: '.bs-button-prev',
						},

						// And if we need scrollbar
						scrollbar: {
							el: '.swiper-scrollbar',
						},
						breakpoints: {
							550: {
								slidesPerView: 3,
							},
							768: {
								slidesPerView: 4,
							},
							1200: {
								slidesPerView: 8,
							},
							1400: {
								slidesPerView: 10,
							}
						}
					});
				}
			});
		},

		/* Methods Close*/


	},
	setup() {
		let product_id = ref('');
		let quanitity = ref('');
		let user_id = ref('');
		const CartData = useShoppingStore();
		axios.get('/api/user', {
			headers: {
				Authorization: 'Bearer ' + sessionStorage.getItem('token'),
			},
		}).then(res => {
			console.log("working");
			user_id.value = res.data.id;
		});

		const addToCart = async (product_id) => {
			CartData.addToCart(product_id, quanitity, user_id.value);

			/*  await axios.post('/api/addToCart',{
				product_id:product_id,
				quantity:1,
				uid:user_id.value
			}).then(res=>{
				console.log("Product has added to cart!!!");
			})  */
		}
		/* const callback = (response) => {
  // This callback will be triggered when the user selects or login to
  // his Google account from the popup
  console.log("Handle the response", response)
}*/
		return {
			addToCart,
			product_id,
			quanitity,
			user_id

		}
	}
}
</script>