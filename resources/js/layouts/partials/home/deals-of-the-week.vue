<template>
    <section>
        <!-- Categories Slider Starts -->
        <div class="row" v-if="deals != ''">
            <div class="col-lg-12">
                <div class="section-heading d-flex justify-content-between">
                    <h5>Deals of the week</h5>
                </div>
            </div>
            <div class="col-lg-12 mt-40">
                <div class="loading" v-if="loading">Loading...</div>
                <swiper v-else :modules="modules" :slides-per-view="1" :navigation="navigation" :space-between="30" @swiper="onSwiper" @slideChange="onSlideChange"
                    class="deal-box p-4">
                    <swiper-slide v-for="item in deals" :key="item.id" class="categories-item p-relative w-img mb-30">

                        <div class="deal-product-box">
                            <h6>
                                <router-link :to="{ name: 'ProductCategory', params: { slug: item.slug } }">
                                    {{ item.category }}
                                </router-link>
                            </h6>
                            <div class="product-image text-center">
                                <router-link :to="{ name: 'ProductCategory', params: { slug: item.slug } }">
                                    <img v-if="item.file_name" :src="item.file_name" :alt="item.file_original_name" />
                                    <img v-else src="@/asset/images/default.png" alt="default" />
                                </router-link>
                            </div>

                            <button id="quick-view" class="medium mt-3 mb-3">QUICK VIEW</button>

                            <p class="product-price"><span class="sale-price blue medium">$395.00</span>
                                <span id="review-stars">
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <i class="bi bi-star"></i>
                                    <span id="star-count">(0)</span>
                                </span>
                            </p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                    aria-valuemax="100" style="width:70%">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                            <p class="product-count medium">Already Sold: <span id="sold-count" class="blue">20</span> <span
                                    id="available">Available: <span id="available-count" class="blue">35</span></span></p>

                            <!-- Counter Starts-->
                            <div class="countdown mt-20">
                                <div class="countdown-inner" data-countdown="" data-date="Mar 02 2023 20:20:22">
                                    <ul class="text-center d-flex justify-content-between">
                                        <li><span data-days="">2</span> Days</li>
                                        <li><span data-hours="">5</span> Hours</li>
                                        <li><span data-minutes="">32</span> Mins</li>
                                        <li><span data-seconds="">16</span> Secs</li>
                                    </ul>
                                </div>
                            </div>
                            <!--Counter Ends-->
                        </div>
                    </swiper-slide>
                    <div class="navigation d-flex justify-content-between">
                        <button class="custom-prev-btn"><i class="bi bi-chevron-double-left"></i> Previous </button>
                        <button class="custom-next-btn">Next <i class="bi bi-chevron-double-right"></i></button>
                    </div>
                </swiper>
            </div>
        </div>
        <!-- Categories Slider Ends -->
    </section>
</template>
<script>
import { Swiper } from "@/../../node_modules/swiper/vue/swiper";
import { SwiperSlide } from "@/../../node_modules/swiper/vue/swiper-slide";
import { Navigation } from "@/../../node_modules/swiper";
//import { Swiper, SwiperSlide } from '@/../../node_modules/swiper/vue/swiper';
//import { Swiper } from "@/../../node_modules/swiper/vue/swiper";
//import { SwiperSlide } from "@/../../node_modules/swiper/vue/swiper-slide";
// Import Swiper styles
import "@/../../node_modules/swiper/swiper-bundle.css";

export default {
    name: 'DealsoftheWeek',
    components: {
        Swiper,
        SwiperSlide,
    },
    data() {
        return {
            deals: [],
            loading: false,
            modules: [Navigation],
            navigation: { 
                prevEl: '.custom-prev-btn', 
                nextEl: '.custom-next-btn' 
            }
        }
    },
    methods: {
        onSwiper: function () {
            //console.log("onSwiper called");
        },
        onSlideChange: function () {
            //console.log("Slide change");
        },
        get_deals_of_the_week() {
            this.loading = true;
            try {
                axios.get('/api/get_top_categories').then(({ data }) => {
                    this.deals = data.data;
                    //console.log(data.data);
                });
            } catch (error) {

            } finally {
                this.loading = false
            }
        }
    },
    mounted() {
        this.get_deals_of_the_week();
    }
}
</script>
<style scoped>
.deal-box {
    border: 2px solid #1467c1;
}

.deal-box img {
    max-height: 150px;
}

.navigation button {
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
}
.navigation button i {
    font-size: 14px;
}
</style>