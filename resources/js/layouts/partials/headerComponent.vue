<template>
	<div>

		<!-- header-start -->
		<header class="header">
			<div class="header-top">
				<div class="container">
					<div class="header-inner">
						<div class="row align-items-center">
							<div class="col-xl-6 col-lg-7">
								<div class="header-inner-start">
									<div class="top-menu-wrapper">
										<ul>
											<li>
												<a href="mailto:{{ femail }}"><i class="bi bi-envelope"></i>
													{{ femail }}</a>
											</li>
											<li>
												<a href="tel:{{ fphone }}"><i class="bi bi-phone"></i> {{ fphone }}</a>
											</li>
										</ul>
									</div>
									<div class="text-end d-lg-none">
										<button type="button" class="side-menu-btn offcanvas-toggle-btn">
											<i class="bi bi-list"></i>
										</button>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-5 d-none d-lg-block">
								<div class="header-inner-end text-md-end">
									<div class="top-menu-wrapper">
										<ul>
											<li><router-link :to="{name:'About'}">About Us</router-link></li>
											<li><a href="">Order Tracking</a></li>
											<li><router-link :to="{name:'Contact'}">Contact Us</router-link></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="header-mid">
				<div class="container">
					<div class="heade-mid-inner">
						<div class="row align-items-center">
							<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
								<div class="header__info">
									<div class="logo">
										<router-link to="/" class="logo-image">
											<img :src="logo" v-bind:alt="logo"  />
										</router-link>

									</div>
								</div>
							</div>
							<div class="col-xl-5 col-lg-4 d-none d-lg-block">
								<div class="header-search-container">
									<form action="#">
										<div class="header-search">
											<input class="search-input" type="text" placeholder="">
											<button class="button" type="submit">
												<i class="bi bi-search"></i>
											</button>
										</div>
										<div class="header-search-dropdown">
											<vue-select :options="options" close-on-select :min="1"> </vue-select>
											<!--<select>
												<option>All Categories</option>
												<option>Pantry & Breakroom</option>
												<option>Technology & Hardware</option>
												<option>Office Machine & Equipment</option>
												<option>Office Stationary</option>
												<option>Paper & Envelope</option>
											</select>-->
										</div>
									</form>
								</div>
							</div>
							<div class="col-xl-4 col-lg-5 col-md-8 col-sm-8">
								<div class="block-userlink text-end">
									<div class="user-links-wrapper">
										<ul v-if="token!=0">
											<!-- {{ user.id}} -->
											<li><i class="bi bi-person"></i> <router-link  :to="{name:'MyAccount'}">Hi, 
												<!-- {{ authUser }} -->
												 <span v-if="user">{{ authUser.first_name }}</span> 
												
												
												!</router-link> </li>
											<li><a href="#!" @click="logout">Logout</a>	</li>
										</ul>
										<ul v-else>
											<li><router-link :to="{name: 'Login'}" >Sign In</router-link></li>
											<li><router-link v-if="token==0" :to="{name: 'Register'}">Register</router-link></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom d-none d-lg-block">
				<div class="container">
					<div class="row g-0 align-items-center">
						<div class="col-lg-3">
							<div class="cat__menu-wrapper side-border d-none d-lg-block">
								<div class="cat-toggle">
									<button type="button" class="cat-toggle-btn">
										<i class="bi bi-list"></i> Browse Categories </button>
									<div class="cat__menu">
										<nav id="mobile-menu ">
											<ul>
												<li>
													<a href="">All Categories <i class="bi bi-chevron-down"></i>
													</a>
													<ul class="mega-menu">
														<li>
															<a href="">Pantry & Breakroom</a>
															<ul class="mega-item">
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Pantry & Breakroom</a>
															<ul class="mega-item">
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Pantry & Breakroom</a>
															<ul class="mega-item">
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Pantry & Breakroom</a>
															<ul class="mega-item">
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Pantry & Breakroom</a>
															<ul class="mega-item">
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
															</ul>
														</li>
													</ul>
												</li>
												<li>
													<a href="">Technology & Hardware <i class="bi bi-chevron-down"></i>
													</a>
													<ul class="mega-menu mega-menu-2">
														<li>
															<a href="">Pantry & Breakroom</a>
															<ul class="mega-item">
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Pantry & Breakroom</a>
															<ul class="mega-item">
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Pantry & Breakroom</a>
															<ul class="mega-item">
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
																<li>
																	<a href="">Lorem Ipsum</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Phone &amp; Tablets</a>
															<ul class="mega-item">
																<li>
																	<a href="">Catagory 1</a>
																</li>
																<li>
																	<a href="">Catagory 2</a>
																</li>
																<li>
																	<a href="">Catagory 3</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Phone &amp; Tablets</a>
															<ul class="mega-item">
																<li>
																	<a href="">Catagory 1</a>
																</li>
																<li>
																	<a href="">Catagory 2</a>
																</li>
																<li>
																	<a href="">Catagory 3</a>
																</li>
															</ul>
														</li>
													</ul>
												</li>
												<li>
													<a href="">Best Seller Products <span class="cat-label">hot!</span>
														<i class="bi bi-chevron-down"></i>
													</a>
													<ul class="mega-menu">
														<li>
															<a href="">Shop Pages</a>
															<ul class="mega-item">
																<li>
																	<a href="">Standard SHop Page</a>
																</li>
																<li>
																	<a href="">Shop Right Sidebar</a>
																</li>
																<li>
																	<a href="">Shop Left Sidebar</a>
																</li>
																<li>
																	<a href="">Shop 3 Column</a>
																</li>
																<li>
																	<a href="">Shop 4 Column</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Product Pages</a>
															<ul class="mega-item">
																<li>
																	<a href="">Product Details</a>
																</li>
																<li>
																	<a href="">Product V2</a>
																</li>
																<li>
																	<a href="">Product V3</a>
																</li>
																<li>
																	<a href="">Varriable Product</a>
																</li>
																<li>
																	<a href="">External Product</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Other Pages</a>
															<ul class="mega-item">
																<li>
																	<a href="">wishlist</a>
																</li>
																<li>
																	<a href="">Shopping Cart</a>
																</li>
																<li>
																	<a href="">Checkout</a>
																</li>
																<li>
																	<a href="">Login</a>
																</li>
																<li>
																	<a href="">Register</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Phone &amp; Tablets</a>
															<ul class="mega-item">
																<li>
																	<a href="">Catagory 1</a>
																</li>
																<li>
																	<a href="">Catagory 2</a>
																</li>
																<li>
																	<a href="">Catagory 3</a>
																</li>
															</ul>
														</li>
														<li>
															<a href="">Phone &amp; Tablets</a>
															<ul class="mega-item">
																<li>
																	<a href="">Catagory 1</a>
																</li>
																<li>
																	<a href="">Catagory 2</a>
																</li>
																<li>
																	<a href="">Catagory 3</a>
																</li>
															</ul>
														</li>
													</ul>
												</li>
												<li>
													<a href="">Top 10 Offers <span class="cat-label green">new!</span>
													</a>
												</li>
												<li>
													<a href="">Pantry &amp; Breakroom</a>
												</li>
												<li>
													<a href="">Office Machine & Equipment</a>
												</li>
												<li class="d-laptop-none">
													<a href="">Office Stationary</a>
												</li>
												<li class="d-laptop-none">
													<a href="">Paper & Envelope</a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-6">
							<div class="header__bottom-left d-flex d-xl-block align-items-center">
								<div class="side-menu d-lg-none mr-20">
									<button type="button" class="side-menu-btn offcanvas-toggle-btn">
										<i class="bi bi-list"></i>
									</button>
								</div>
								<div class="main-menu d-none d-lg-block">
									<nav>
										<ul>
											<li><router-link :to="{name:'/'}" class="active">Home</router-link></li>
											<li>
												<router-link :to="{name:'About'}">About Us</router-link>
											</li>
											<li class="has-mega">
												<a href="products.php">Shop <i class="bi bi-chevron-down"></i></a>
												<div class="mega-menu">
													<div class="container container-mega">
														<ul>
															<li>
																<ul>
																	<li class="title"><a href="">Pantry & Breakroom</a>
																	</li>
																	<li><a href="">Link 1</a></li>
																	<li><a href="">Link 2</a></li>
																	<li><a href="">Link 3</a></li>
																	<li><a href="">Link 4</a></li>
																	<li><a href="">Link 5</a></li>
																</ul>
															</li>
															<li>
																<ul>
																	<li class="title"><a href="">Pantry & Breakroom</a>
																	</li>
																	<li><a href="">Link 1</a></li>
																	<li><a href="">Link 2</a></li>
																	<li><a href="">Link 3</a></li>
																	<li><a href="">Link 4</a></li>
																	<li><a href="">Link 5</a></li>
																</ul>
															</li>
															<li>
																<ul>
																	<li class="title"><a href="">Pantry & Breakroom</a>
																	</li>
																	<li><a href="">Link 1</a></li>
																	<li><a href="">Link 2</a></li>
																	<li><a href="">Link 3</a></li>
																	<li><a href="">Link 4</a></li>
																	<li><a href="">Link 5</a></li>
																</ul>
															</li>
															<li>
																<ul>
																	<li class="title"><a href="">Pantry & Breakroom</a>
																	</li>
																	<li><a href="">Link 1</a></li>
																	<li><a href="">Link 2</a></li>
																	<li><a href="">Link 3</a></li>
																	<li><a href="">Link 4</a></li>
																	<li><a href="">Link 5</a></li>
																</ul>
															</li>
															<li>
																<ul>
																	<li class="title"><a href="">Pantry & Breakroom</a>
																	</li>
																	<li><a href="">Link 1</a></li>
																	<li><a href="">Link 2</a></li>
																	<li><a href="">Link 3</a></li>
																	<li><a href="">Link 4</a></li>
																	<li><a href="">Link 5</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</li>
											<li>
												<router-link :to="{name:'Blog'}">Blog</router-link>
											</li>
											<li>
												<a href="">Services <i class="bi bi-chevron-down"></i>
												</a>
												<ul class="submenu">
													<li><a href="">Warehousing Solutions</a></li>
													<li><a href="">Last Mile Delivery</a></li>
													<li><a href="">Freight Forwarding</a></li>
													<li><a href="">Courier Services</a></li>
													<li><a href="">Runner Services</a></li>
												</ul>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-6 text-end">
							<div class="menu-actions-link header-action text-sm-end">
								<div class="block-wishlist action">
									<!--<a class="icon-link" href="">
										<i class="bi bi-heart"></i>
										<span class="text">Wishlist</span>
									</a>-->
									<router-link class="icon-link" v-if="!token" :to="{name: 'Login'}" :from="{name : 'Wishlist'}">
										<i class="bi bi-heart"></i>
										<span class="text">Wishlist</span>
									</router-link>
        							<router-link class="icon-link" v-else :to="{name : 'Wishlist'}" >
										<i class="bi bi-heart"></i>
										<span class="text">Wishlist</span>
									</router-link>
								</div>
								<!-- Shopping Cart Starts-->
								<div class="block-cart action">
									<router-link :to="{name:'Cart'}" class="icon-link">
										<i class="bi bi-cart"></i>
										<span class="count">{{ countCartItems }}</span>
										<span class="text">Cart</span>
									</router-link>
									<div class="cart">
										<div class="cart-box">
											<ul>
												<li>
													<div class="cart__title">
														<h4>Your Cart</h4>
													</div>
												</li>
												<li>
													<div class="cart__item d-flex justify-content-between align-items-center">
														<div class="cart__inner d-flex">
															<div class="cart__thumb">
																<a href="">
																	<img src="@/asset/images/products/product-1.jpg" alt="">
																</a>
															</div>
															<div class="cart__details">
																<h6>
																	<a href="">Brother LC-3617 Black Ink</a>
																</h6>
																<div class="cart__price">
																	<span>RM 58.00</span>
																</div>
															</div>
														</div>
														<div class="cart__del">
															<a href="#">
																<i class="bi bi-x"></i>
															</a>
														</div>
													</div>
												</li>
												<li>
													<div class="cart__sub d-flex justify-content-between align-items-center">
														<h6>Subtotal</h6>
														<span class="cart__sub-total">RM 58.00</span>
													</div>
												</li>
												<li>
													<router-link :to="{name:'Cart'}" class="wc-cart mb-10">View cart</router-link>
													<router-link :to="{name:'Cart'}" class="wc-checkout">Checkout</router-link>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- Shopping Cart Ends-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- header-end -->
		<!-- offcanvas area start -->
		<div class="offcanvas__area">
			<div class="offcanvas__wrapper">
				<div class="offcanvas__close">
					<button class="offcanvas__close-btn" id="offcanvas__close-btn">
						<i class="bi bi-x"></i>
					</button>
				</div>
				<div class="offcanvas__content">
					<div class="offcanvas__search mt-40 mb-35">
						<form action="#">
							<input type="text" placeholder="What are you searching for?">
							<button type="submit">
								<i class="far fa-search"></i>
							</button>
						</form>
					</div>
					<div class="mobile-menu fix"></div>
					<div class="offcanvas__action"></div>
				</div>
			</div>
		</div>
		<!-- offcanvas area end -->
		<div class="body-overlay"></div>
		<!-- offcanvas area end -->
	</div>
</template>

<script >
import { ref  } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import router from "@/router";
import { UserStore } from '../../store/UserStore';
/* import { CartStore } from '../../store/CartStore'; */
import { useShoppingStore } from '@/store/CartStore';
import { mapState } from 'pinia';
import logoutComponents from '../../mixins/logout';

export default ({
	//components: {VueNextSelect},
	computed: {
	//  ...mapState(UserStore, ['email', 'name','user'])
		  ...mapState(UserStore, ['token','user','authUser']),
		...mapState(useShoppingStore,['countCartItems'])
	},

	props: ['logo','femail', 'fphone'],

 	async created(){
		UserStore().fetchUser(),
		useShoppingStore().CartItems()
	/* 	
		if (sessionStorage.getItem('token') != null) {
		 axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                    },

                }).then( ({data})=>{
                   
                   console.log(data);
                
                  
                }).catch(error => {
                    if (error.response.status == 500) {
                        sessionStorage.clear();
                       // window.location.href = '/login';
                       // console.log(error.response.status);
                    }

                });
	} */
},
	
  
	

	methods: {
		
	},
	setup() {
		//const router = useRouter();
		const { logout } = logoutComponents();
		const data = useShoppingStore();
		const options = ref([
				{ name: 'Vue.js', language: 'JavaScript' },
				{ name: 'Rails', language: 'Ruby' },
				{ name: 'Sinatra', language: 'Ruby' },
				{ name: 'Laravel', language: 'PHP' },
				{ name: 'Phoenix', language: 'Elixir' },
				])
		//router.push({ name: '/' });
		/* function logout() {
			alert(1);
		} */
		
		return {
			router,
			logout,
			data,
			options
		}
		/* const router = useRouter();
		const logout = () => {
			UserStore().removeEmail('email');
			router.push({ name: '/' });
		}
		return {
			router,
			logout
		} */
	}

});

</script>

<style>
#mobile-menu {
	display: block;
}
</style>
