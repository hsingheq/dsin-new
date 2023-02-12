<template>
  <div>
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
  </div>
</template>

<script>
export default {

    created(){
        this.main_slider_home()
    },

    methods:{

  
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
    }
}
</script>

<style>

</style>