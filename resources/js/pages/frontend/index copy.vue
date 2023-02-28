<template>
	<div>

		<div class="wrapper">
			<!-- Main Content Starts -->
			<!-- Slider Starts -->
			<section class="slider-area">
				<div class="swiper-container slider__active">
					<div class="swiper-wrapper">
						<div class="single-slider swiper-slide slider-height d-flex align-items-center"
							style="background-image: url(https://dimsemenov.com/plugins/royal-slider/img/home.jpg);">
							<div class="container">
								<div class="row">
									<div class="col-xl-5">
										<div class="slider-content">
											<div class="slider-top-heading" data-animation="fadeInLeft"
												data-delay="1.5s">
												Trending in the store
											</div>
											<h2 data-animation="fadeInLeft" data-delay="1.7s"
												class="pt-15 slider-title pb-5"><span>What's</span> Trending Slide 1
											</h2>
											<p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">
												Discount 30% On Products & Free Shipping</p>
											<div class="slider-bottom-btn mt-75">
												<a data-animation="fadeInUp" data-delay="1.15s" href="#"
													class="btn-b b-radius">Shop now</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- /single-slider -->
						<div class="single-slider swiper-slide slider-height d-flex align-items-center"
							style="background-image: url(/@/asset/images/slider/slide-1.jpg);">
							<div class="container">
								<div class="row">
									<div class="col-xl-5">
										<div class="slider-content">
											<div class="slider-top-heading" data-animation="fadeInLeft" data-delay="1s">
												Trending in the store
											</div>
											<h2 data-animation="fadeInLeft" data-delay="1.5s"
												class="pt-15 slider-title pb-5">SALE 20% OFF<br> SAMSUNG GALAXY BUDS
												Slide 2</h2>
											<p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.7s">
												Discount 30% On Products & Free Shipping</p>
											<div class="slider-bottom-btn mt-75">
												<a data-animation="fadeInUp" data-delay="1.9s" href="#"
													class="btn-b b-radius">Discover now</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- /single-slider -->
						<div class="main-slider-paginations"></div>
					</div>
				</div>
			</section>
			<!-- Slider Ends -->


			<section class="pt-70 pb-20">
				<div class="container">
					<div class="row g-0">
						<!-- Right Content Sidebar-->
						<div class="col-lg-9 order-md-2">
							<!-- Section Top Categories Starts -->
							<section>

								<div class="row">
									<div class="col-lg-12">
										<div class="section-heading d-flex justify-content-between">
											<h5>Top Categories</h5>
											<div class="button-wrap">
												<!-- If we need navigation buttons -->
												<div class="bs-button bs-button-prev"><i class="bi bi-arrow-left"></i>
												</div>
												<div class="bs-button bs-button-next"><i class="bi bi-arrow-right"></i>
												</div>
											</div>

										</div>
									</div>
								</div>
								<!-- Categories Slider Starts -->
								<div class="row mt-40">
									<div class="categories-slider">
										<div class="swiper-container categories-slider-active">
											<div class="swiper-wrapper">
												<!-- Category Item starts -->
												<div v-for="item in top_categories" :key="item.id"
													class="categories-item swiper-slide p-relative w-img mb-30">
													<div class="categories-img">
														<router-link
															:to="{ name: 'ProductCategory', params: { slug: item.slug } }">
															<img v-if="item.file_name" :src="item.file_name"
																:alt="item.file_original_name" />
															<img v-else src="@/asset/images/default.png"
																alt="default" />
														</router-link>
													</div>
													<div class="categories-content">
														<h6><router-link
																:to="{ name: 'ProductCategory', params: { slug: item.slug } }">{{
																	item.category
																}}</router-link></h6>
													</div>
												</div>
												<!-- Category Item ends -->

											</div>
										</div>
									</div>
								</div>
								<!-- Categories Slider Ends -->
							</section>

							<!-- Section Top Categories Ends -->
							<section class="topsell__area-2 pt-15">
								<div class="row">
									<div class="col-xl-12">
										<div class="section-heading d-flex justify-content-between mb-10">
											<h5 class="st-titile">Our Products</h5>
											<div class="product-nav-tabs">
												<ul class="nav nav-tabs" id="flast-sell-tab" role="tablist">
													<li class="nav-item" role="presentation">
														<button class="nav-link active" id="new-arrivals-tab"
															data-bs-toggle="tab" data-bs-target="#new-arrivals-box"
															type="button" role="tab" aria-controls="computer"
															aria-selected="false">New Arrivals</button>
													</li>
													<li class="nav-item" role="presentation">
														<button class="nav-link" id="on-sale-tab" data-bs-toggle="tab"
															data-bs-target="#on-sale-box" type="button" role="tab"
															aria-selected="true">On Sale</button>
													</li>
													<li class="nav-item" role="presentation">
														<button class="nav-link" id="best-rated-tab"
															data-bs-toggle="tab" data-bs-target="#best-rated-box"
															type="button" role="tab" aria-selected="false">Best
															rated</button>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-20">
									<div class="col-xl-12">
										<div class="tab-content" id="flast-sell-tabContent">
											<div class="tab-pane fade active show" id="new-arrivals-box" role="tabpanel"
												aria-labelledby="new-arrivals-tab">
												<div class="product-bs-slider-2">
													<div class="product-slider-2 swiper-container">
														<div class="swiper-wrapper"
															id="swiper-wrapper-new-arrivals-box">


															<!-- Product Item Starts -->
															<div v-for="item in our_products" :key="item.id"
																class="product-article swiper-slide">
																<div class="product-cat"><a href="#!">Ink & Toner</a>
																</div>
																<div class="product-title"><a
																		href="#!">{{ item.product_title }}</a></div>
																<div class="product-image">
																	<router-link
																		:to="{ name: 'Product', params: { slug: item.slug } }"
																		class="image">
																		<img class="pic-1"
																			:src="base_url + item.file_name">
																		<img class="pic-2"
																			:src="base_url + item.file_name">
																	</router-link>
																	<div class="quick-view-action">
																		<a href="#" class="icon-box"
																			data-bs-toggle="modal"
																			data-bs-target="#productModalId">
																			Quick View
																		</a>
																	</div>
																</div>
																<div class="product-content">
																	<div
																		class="product-info d-flex justify-content-between align-items-center">
																		<div class="price">{{ currency }} {{
																			item.unit_price
																		}} <!-- <del>350</del> -->
																		</div>
																		<div class="rating">
																			<span><i class="bi bi-star"></i></span>
																			<span><i class="bi bi-star"></i></span>
																			<span><i class="bi bi-star"></i></span>
																			<span><i class="bi bi-star"></i></span>
																			<span><i class="bi bi-star"></i></span>
																			<span>(0)</span>
																		</div>
																	</div>
																</div>
																<div
																	class="product-add-cart d-flex justify-content-between align-items-center">
																	<a href="#!" @click="addToCart(item.id)"
																		class="cart-btn">Add to cart</a>
																	<a href="#!" class="wishlist-rounded"><i
																			class="bi bi-heart"></i></a>
																</div>
															</div>


															<!-- Product Item Ends -->


														</div>
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
													</div>
													<!-- If we need navigation buttons -->
													<div class="bs-button bs2-button-prev" tabindex="0" role="button"
														aria-label="Previous slide"
														aria-controls="swiper-wrapper-new-arrivals-box">
														<i class="bi bi-chevron-left"></i>
													</div>
													<div class="bs-button bs2-button-next" tabindex="0" role="button"
														aria-label="Next slide"
														aria-controls="swiper-wrapper-new-arrivals-box">
														<i class="bi bi-chevron-right"></i>
													</div>
												</div>
											</div>
											<!-- New Arrivals Tab Content Ends -->
											<div class="tab-pane fade" id="on-sale-box" role="tabpanel"
												aria-labelledby="on-sale-tab">
												<div class="product-bs-slider-2">
													<div class="product-slider-2 swiper-container">
														<div class="swiper-wrapper" id="swiper-wrapper-on-sale-box">
															<!-- Product Item Starts -->
															<div v-for="item in our_products" :key="item.id"
																class="product-grid swiper-slide">
																<div class="product-image">
																	<router-link
																		:to="{ name: 'Product', params: { slug: item.slug } }"
																		class="image">
																		<img class="pic-1"
																			:src="base_url + item.file_name">
																		<img class="pic-2"
																			:src="base_url + item.file_name">
																	</router-link>
																	<ul class="product-links">
																		<li>
																			<a href="#">
																				<i class="bi bi-cart"></i>
																			</a>
																		</li>
																		<li>
																			<a href="#" class="icon-box"
																				data-bs-toggle="modal"
																				data-bs-target="#productModalId">
																				<i class="bi bi-eye"></i>
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				<i class="bi bi-heart"></i>
																			</a>
																		</li>
																	</ul>
																</div>


																<div class="product-content">
																	<span class="product-categories">
																		<a href="#">Ink & Toner</a>
																	</span>
																	<h3 class="title">
																		<router-link
																			:to="{ name: 'Product', params: { slug: item.slug } }">{{
																				item.product_title
																			}}</router-link>
																	</h3>
																	<div
																		class="rating mb-5 mt-10 justify-content-between">
																		<ul>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																		</ul>
																		<span><a href="">01 review</a></span>
																	</div>
																	<div class="price">{{ currency }} {{
																		item.unit_price
																	}}</div>
																</div>
															</div>
															<!-- Product Item ends -->

														</div>
														<!-- If we need navigation buttons -->
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
													</div>
													<div class="bs-button bs2-button-prev" tabindex="0" role="button"
														aria-label="Previous slide"
														aria-controls="swiper-wrapper-on-sale-box">
														<i class="bi bi-chevron-left"></i>
													</div>
													<div class="bs-button bs2-button-next" tabindex="0" role="button"
														aria-label="Next slide"
														aria-controls="swiper-wrapper-on-sale-box">
														<i class="bi bi-chevron-right"></i>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="best-rated-box" role="tabpanel"
												aria-labelledby="best-rated-tab">
												<div class="product-bs-slider-2">
													<div class="product-slider-2 swiper-container">
														<div class="swiper-wrapper" id="swiper-wrapper-best-rated-box">
															<!-- Product Item Starts -->
															<div v-for="item in our_products" :key="item.id"
																class="product-grid swiper-slide">
																<div class="product-image">
																	<router-link
																		:to="{ name: 'Product', params: { slug: item.slug } }"
																		class="image">
																		<img class="pic-1"
																			:src="base_url + item.file_name">
																		<img class="pic-2"
																			:src="base_url + item.file_name">
																	</router-link>
																	<ul class="product-links">
																		<li>
																			<a href="#">
																				<i class="bi bi-cart"></i>
																			</a>
																		</li>
																		<li>
																			<a href="#" class="icon-box"
																				data-bs-toggle="modal"
																				data-bs-target="#productModalId">
																				<i class="bi bi-eye"></i>
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				<i class="bi bi-heart"></i>
																			</a>
																		</li>
																	</ul>
																</div>
																<div class="product-content">
																	<span class="product-categories">
																		<a href="#">Ink & Toner</a>
																	</span>
																	<h3 class="title">
																		<router-link
																			:to="{ name: 'Product', params: { slug: item.slug } }">{{
																				item.product_title
																			}}</router-link>
																	</h3>
																	<div
																		class="rating mb-5 mt-10 justify-content-between">
																		<ul>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																		</ul>
																		<span><a href="">01 review</a></span>
																	</div>
																	<div class="price">{{ currency }} {{
																		item.unit_price
																	}}</div>
																</div>
															</div>
															<!-- Product Item ends -->


														</div>
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
													</div>
													<!-- If we need navigation buttons -->
													<div class="bs-button bs2-button-prev" tabindex="0" role="button"
														aria-label="Previous slide"
														aria-controls="swiper-wrapper-best-rated-box">
														<i class="bi bi-chevron-left"></i>
													</div>
													<div class="bs-button bs2-button-next" tabindex="0" role="button"
														aria-label="Next slide"
														aria-controls="swiper-wrapper-best-rated-box">
														<i class="bi bi-chevron-right"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<!-- Top Categories Section Ends -->
							<section class="banners">
							</section>
							<!-- Best Selling Products Section Starts -->
							<section class="topsell__area-2 pt-15">
								<div class="row">
									<div class="col-xl-12">
										<div class="section-heading d-flex justify-content-between mb-10">
											<h5 class="st-titile">Best Selling Products</h5>
											<div class="product-nav-tabs">
												<ul class="nav nav-tabs" id="flast-sell-tab" role="tablist">
													<li class="nav-item" role="presentation">
														<button class="nav-link active" id="all-products-tab"
															data-bs-toggle="tab" data-bs-target="#all-products-box"
															type="button" role="tab" aria-controls="computer"
															aria-selected="false">All Products</button>
													</li>
													<li class="nav-item" role="presentation">
														<button class="nav-link" id="on-sale-tab" data-bs-toggle="tab"
															data-bs-target="#on-sale-box" type="button" role="tab"
															aria-selected="true">On Sale</button>
													</li>
													<li class="nav-item" role="presentation">
														<button class="nav-link" id="best-rated-tab"
															data-bs-toggle="tab" data-bs-target="#best-rated-box"
															type="button" role="tab" aria-selected="false">Best
															rated</button>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="row mt-40">
									<div class="col-xl-12">
										<div class="tab-content" id="flast-sell-tabContent">
											<div class="tab-pane fade active show" id="all-products-box" role="tabpanel"
												aria-labelledby="all-products-tab">
												<div class="product-bs-slider-2">
													<div class="product-slider-3 swiper-container">
														<div class="swiper-wrapper"
															id="swiper-wrapper-all-prodcuts-box">
															<!-- Product Item Starts -->
															<div v-for="item in best_selling_products" :key="item.id"
																class="product-grid swiper-slide">
																<div class="product-image">
																	<router-link
																		:to="{ name: 'Product', params: { slug: item.slug } }"
																		class="image">
																		<img class="pic-1"
																			:src="base_url + item.file_name">
																		<img class="pic-2"
																			:src="base_url + item.file_name">
																	</router-link>
																	<ul class="product-links">
																		<li>
																			<a href="#">
																				<i class="bi bi-cart"></i>
																			</a>
																		</li>
																		<li>
																			<a href="#" class="icon-box"
																				data-bs-toggle="modal"
																				data-bs-target="#productModalId">
																				<i class="bi bi-eye"></i>
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				<i class="bi bi-heart"></i>
																			</a>
																		</li>
																	</ul>
																</div>
																<div class="product-content">
																	<span class="product-categories">
																		<a href="#">Ink & Toner</a>
																	</span>
																	<h3 class="title">
																		<router-link
																			:to="{ name: 'Product', params: { slug: item.slug } }">{{
																				item.product_title
																			}}</router-link>
																	</h3>
																	<div
																		class="rating mb-5 mt-10 justify-content-between">
																		<ul>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																		</ul>
																		<span><a href="">01 review</a></span>
																	</div>
																	<div class="price">{{ currency }} {{
																		item.unit_price
																	}} <del>{{ currency }} 50.00</del>
																	</div>
																</div>
															</div>
															<!-- Product Item ends -->

														</div>
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
													</div>
													<!-- If we need navigation buttons -->
													<div class="bs-button bs3-button-prev" tabindex="0" role="button"
														aria-label="Previous slide"
														aria-controls="swiper-wrapper-all-prodcuts-box">
														<i class="bi bi-chevron-left"></i>
													</div>
													<div class="bs-button bs3-button-next" tabindex="0" role="button"
														aria-label="Next slide"
														aria-controls="swiper-wrapper-all-products-box">
														<i class="bi bi-chevron-right"></i>
													</div>
												</div>
											</div>
											<!-- New Arrivals Tab Content Ends -->
											<div class="tab-pane fade" id="on-sale-box" role="tabpanel"
												aria-labelledby="on-sale-tab">
												<div class="product-bs-slider-2">
													<div class="product-slider-2 swiper-container">
														<div class="swiper-wrapper" id="swiper-wrapper-on-sale-box">
															<!-- Product Item Starts -->
															<div v-for="item in our_products" :key="item.id"
																class="product-grid swiper-slide">
																<div class="product-image">
																	<router-link
																		:to="{ name: 'Product', params: { slug: item.slug } }"
																		class="image">
																		<img class="pic-1"
																			:src="base_url + item.file_name">
																		<img class="pic-2"
																			:src="base_url + item.file_name">
																	</router-link>
																	<ul class="product-links">
																		<li>
																			<a href="#">
																				<i class="bi bi-cart"></i>
																			</a>
																		</li>
																		<li>
																			<a href="#" class="icon-box"
																				data-bs-toggle="modal"
																				data-bs-target="#productModalId">
																				<i class="bi bi-eye"></i>
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				<i class="bi bi-heart"></i>
																			</a>
																		</li>
																	</ul>
																</div>
																<div class="product-content">
																	<span class="product-categories">
																		<a href="#">Ink & Toner</a>
																	</span>
																	<h3 class="title">
																		<router-link
																			:to="{ name: 'Product', params: { slug: item.slug } }">{{
																				item.product_title
																			}}</router-link>
																	</h3>
																	<div
																		class="rating mb-5 mt-10 justify-content-between">
																		<ul>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																		</ul>
																		<span><a href="">01 review</a></span>
																	</div>
																	<div class="price">{{ currency }} {{
																		item.unit_price
																	}}</div>
																</div>
															</div>
															<!-- Product Item ends -->

														</div>
														<!-- If we need navigation buttons -->
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
													</div>
													<div class="bs-button bs2-button-prev" tabindex="0" role="button"
														aria-label="Previous slide"
														aria-controls="swiper-wrapper-on-sale-box">
														<i class="bi bi-chevron-left"></i>
													</div>
													<div class="bs-button bs2-button-next" tabindex="0" role="button"
														aria-label="Next slide"
														aria-controls="swiper-wrapper-on-sale-box">
														<i class="bi bi-chevron-right"></i>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="best-rated-box" role="tabpanel"
												aria-labelledby="best-rated-tab">
												<div class="product-bs-slider-2">
													<div class="product-slider-2 swiper-container">
														<div class="swiper-wrapper" id="swiper-wrapper-best-rated-box">
															<!-- Product Item Starts -->
															<div v-for="item in our_products" :key="item.id"
																class="product-grid swiper-slide">
																<div class="product-image">
																	<router-link
																		:to="{ name: 'Product', params: { slug: item.slug } }"
																		class="image">
																		<img class="pic-1"
																			:src="base_url + item.file_name">
																		<img class="pic-2"
																			:src="base_url + item.file_name">
																	</router-link>
																	<ul class="product-links">
																		<li>
																			<a href="#">
																				<i class="bi bi-cart"></i>
																			</a>
																		</li>
																		<li>
																			<a href="#" class="icon-box"
																				data-bs-toggle="modal"
																				data-bs-target="#productModalId">
																				<i class="bi bi-eye"></i>
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				<i class="bi bi-heart"></i>
																			</a>
																		</li>
																	</ul>
																</div>
																<div class="product-content">
																	<span class="product-categories">
																		<a href="#">Ink & Toner</a>
																	</span>
																	<h3 class="title">
																		<router-link
																			:to="{ name: 'Product', params: { slug: item.slug } }">{{
																				item.product_title
																			}}</router-link>
																	</h3>
																	<div
																		class="rating mb-5 mt-10 justify-content-between">
																		<ul>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																			<li><a href="#"><i
																						class="bi bi-star"></i></a></li>
																		</ul>
																		<span><a href="">01 review</a></span>
																	</div>
																	<div class="price">{{ currency }} {{
																		item.unit_price
																	}}</div>
																</div>
															</div>
															<!-- Product Item ends -->

															<!-- Product Item ends -->
														</div>
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
														<span class="swiper-notification" aria-live="assertive"
															aria-atomic="true"></span>
													</div>
													<!-- If we need navigation buttons -->
													<div class="bs-button bs2-button-prev" tabindex="0" role="button"
														aria-label="Previous slide"
														aria-controls="swiper-wrapper-best-rated-box">
														<i class="bi bi-chevron-left"></i>
													</div>
													<div class="bs-button bs2-button-next" tabindex="0" role="button"
														aria-label="Next slide"
														aria-controls="swiper-wrapper-best-rated-box">
														<i class="bi bi-chevron-right"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<!-- Best Selling Products Section Ends -->
						</div>
						<!-- Right Content Sidebar Ends-->
						<!-- Left Content Sidebar-->
						<div class="col-lg-3 order-md-1">
							C
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
import '../../asset/js/swiper.js';
import '../../asset/css/swiper.css';

const base_url = import.meta.env.VITE_MY_ENV_VARIABLE;
export default {
	name: 'login',

	computed: {
		...mapState(UserStore, ['authUser'])
		/* ...mapState('UserStore',['authUser']) */
	},
	data() {
		return {
			base_url,
			top_categories: [],
			our_products: [],
			best_selling_products: [],
			currency: '',
			user_id: '',
			loading: false


		}
	},
	created() {

		this.main_slider_home();
		this.categorySlider();
		this.productSlider();
		this.productSlider2();
		this.productSlider3();
		this.productSlider4();
		// GETTING TOP CATEGORIES
		this.get_top_categories();
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
		get_top_categories() {
			this.loading = true;
			try {
				axios.get('/api/get_top_categories').then(({ data }) => {
					this.top_categories = data.data;
					//console.log(data.data);
				});
			} catch (error) {

			} finally {
				this.loading = false
			}
		},

		categorySlider() {
			jQuery(function () {
				if (jQuery(".categories-slider-active").length > 0) {
					let categories_slider = new Swiper('.categories-slider-active', {
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

		main_slider_home() {
			jQuery(function () {
				if (jQuery(".slider__active").length > 0) {
					let sliderActive1 = ".slider__active";
					let sliderInit1 = new Swiper(sliderActive1, {
						// Optional parameters
						slidesPerView: 1,
						slidesPerColumn: 1,
						paginationClickable: true,
						loop: false,
						effect: 'fade',

						autoplay: {
							delay: 5000,
						},

						// If we need pagination
						pagination: {
							el: ".main-slider-paginations",
							// dynamicBullets: true,
							clickable: true,
						},

						// Navigation arrows
						navigation: {
							nextEl: ".swiper-button-next",
							prevEl: ".swiper-button-prev",
						},

						a11y: false,
					});

					function animated_swiper(selector, init) {
						let animated = function animated() {
							$(selector + " [data-animation]").each(function () {
								let anim = $(this).data("animation");
								let delay = $(this).data("delay");
								let duration = $(this).data("duration");

								$(this)
									.removeClass("anim" + anim)
									.addClass(anim + " animated")
									.css({
										webkitAnimationDelay: delay,
										animationDelay: delay,
										webkitAnimationDuration: duration,
										animationDuration: duration,
									})
									.one(
										"webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
										function () {
											$(this).removeClass(anim + " animated");
										}
									);
							});
						};
						animated();
						// Make animated when slide change
						init.on("slideChange", function () {
							$(sliderActive1 + " [data-animation]").removeClass("animated");
						});
						init.on("slideChange", animated);
					}
					animated_swiper(sliderActive1, sliderInit1);
				}
			});
		}
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