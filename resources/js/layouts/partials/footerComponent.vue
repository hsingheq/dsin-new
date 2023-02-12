<template>
	<div>

		<footer>
			<!-- Footer Top Starts -->
			<div class="footer-top pt-60 pb-15">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-3">
							<div class="footer-box">
								<div class="footer-heading footer-logo mb-20">
									<img src="@/asset/images/logo.png" class="">
								</div>
								<div class="footer-content">
									<p>{{about}}</p>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3">
							<div class="footer-box">
								<div class="footer-heading">
									<h4>Quick Links</h4>
								</div>
								<div class="footer-content">
									<div class="footer-links">
										<ul>
											<li>
												<router-link :to="{name:'About'}">About</router-link>
											</li>
											<li>
												<router-link :to="{name:'Contact'}">Contact</router-link>
											</li>
											<li>
												<router-link :to="{name:'Login'}">My account</router-link>
											</li>
											<!-- <li>
												<a href="">Order Tracking</a>
											</li>
											<li>
												<a href="">FAQs</a>
											</li> -->
											<li>
												<router-link :to="{name:'Disclaimer'}">Disclaimer</router-link>
											</li>
											<li>
												<router-link :to="{name:'PrivacyPolicy'}">Privacy Policy</router-link>
											</li>
											<li>
												<router-link :to="{name:'Tmc'}">Terms & Conditions</router-link>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3">
							<div class="footer-box">
								<div class="footer-heading">
									<h4>Our Services</h4>
								</div>
								<div class="footer-content">
									<div class="footer-links">
										<ul>
											<li><a href="">Warehousing Solutions</a></li>
											<li><a href="">Last Mile Delivery</a></li>
											<li><a href="">Freight Forwarding</a></li>
											<li><a href="">Courier Services</a></li>
											<li><a href="">Runner Services</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-3">
							<div class="footer-box">
								<div class="footer-heading mb-20">
									<h4>Contact</h4>
								</div>
								<div class="footer-content">
									
									<div class="footer-icon-box d-flex align-items-center mb-10">
										<div class="icon mr-15">
											<i class="bi bi-headset"></i>
										</div>
										<div class="text">
											<span>
												<router-link to="{{ fphone }}">{{ fphone }}</router-link>
											</span>
										</div>
									</div>
									<div class="footer-icon-box d-flex align-items-center mb-10">
										<div class="icon mr-15">
											<i class="bi bi-geo-alt-fill"></i>
										</div>
										<div class="text">
											<span>
												{{ address }}
											</span>
										</div>
									</div>
									<div class="footer-icon-box d-flex align-items-center mb-10">
										<div class="icon mr-15">
											<i class="bi bi-envelope"></i>
										</div>
										<div class="text">
											<span><a href="mailto:{{ femail }}">{{ femail }}</a></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Footer Top Ends -->
			<!-- Footer Bottom Starts -->
			<div class="footer-bottom">
				<div class="container">
					<div class="footer-bottom-content pt-35 pb-25">
						<div class="row">
							<div class="col-lg-6">
								<p>{{ copy_right }}</p>
							</div>
							<div class="col-lg-6 text-end">
								<a href="">
									<!-- <img src="assets/images/payment.png" alt=""> -->
									<img :src="base_url+'assets/images/payment.png'" alt="">
									
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Footer Bottom Ends -->

		</footer>
		<!-- footer-end -->
		<!-- back to top start -->
		<div class="progress-wrap">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
				<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
			</svg>
		</div>
		<!-- back to top end -->

		<!-- JS here -->

	</div>
</template>

<script>
const base_url = import.meta.env.VITE_MY_ENV_VARIABLE;
// import asset_path from '@/mixins/asset_path';
export default {
	props: ['femail', 'fphone', 'address','about','copy_right'],
	data(){
		return{
			base_url
		}
	},
	// mixins: [asset_path],
	created() {
	
	},
	methods: {

	},

	setup() {
		/* const asset_path = (imageName=null) => {
			return '//dsinagility.cw/assets/images/' + imageName;
		}
		return {
			asset_path
		} */
	}

}
</script>