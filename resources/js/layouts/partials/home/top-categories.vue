<template>
    <section>

        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading d-flex justify-content-between">
                    <h5>Top Categories</h5>
                    <div class="button-wrap">
                        <!-- If we need navigation buttons -->
                        <button class="bs-button bs-button-prev"><i class="bi bi-arrow-left"></i>
                        </button>
                        <button class="bs-button bs-button-next"><i class="bi bi-arrow-right"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Categories Slider Starts -->
        <div class="row mt-40 mb-40">
            <div class="loading" v-if="loading">Loading...</div>
            <swiper v-else :breakpoints="swiperOptions.breakpoints" :modules="modules" :navigation="navigation"  :space-between="30" @swiper="onSwiper" @slideChange="onSlideChange"
                class="categories-slider-active">
                <swiper-slide v-for="item in top_categories" :key="item.id" class="categories-item p-relative w-img mb-30">
                    <div class="categories-img">
                        <router-link :to="{ name: 'ProductCategory', params: { slug: item.slug } }">
                            <img v-if="item.file_name" :src="item.file_name" :alt="item.file_original_name" />
                            <img v-else src="@/asset/images/default.png" alt="default" />
                        </router-link>
                    </div>
                    <div class="categories-content">
                        <h6><router-link :to="{ name: 'ProductCategory', params: { slug: item.slug } }">{{
                            item.category
                        }}</router-link></h6>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
        <!-- Categories Slider Ends -->
    </section>
</template>
<script>
import { Swiper } from "@/../../node_modules/swiper/vue/swiper";
import { SwiperSlide } from "@/../../node_modules/swiper/vue/swiper-slide";
import { Navigation } from "@/../../node_modules/swiper";
// Import Swiper styles
import "@/../../node_modules/swiper/swiper.min.css";
export default {
    name: 'TopCategories',
    components: {
        Swiper,
        SwiperSlide,
    },
    data() {
        return {
            top_categories: [],
            loading: false,
            modules: [Navigation],
            navigation: {
                prevEl: '.bs-button-prev',
                nextEl: '.bs-button-next'
            },
            swiperOptions: {
                breakpoints: {       
                    320: {       
                        slidesPerView: 1,
                        spaceBetween: 30     
                    },          
                    770: {       
                        slidesPerView: 2,       
                        spaceBetween: 50     
                    },   
                
                    771: {       
                        slidesPerView: 4,       
                        spaceBetween: 30     
                    } 
                }   
            },
        }
    },
    methods: {
        onSwiper: function () {
            //console.log("onSwiper called");
        },
        onSlideChange: function () {
            //console.log("Slide change");
        },
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
        }
    },
    mounted() {
        this.get_top_categories();
    }
}
</script>