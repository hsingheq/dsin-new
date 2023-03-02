<template>
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading d-flex justify-content-between">
                    <div class="product-nav-tabs">
                        <ul class="nav nav-tabs" id="flast-sell-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="new-arrivals-tab" data-bs-toggle="tab"
                                    data-bs-target="#new-arrivals-box" type="button" role="tab" aria-controls="computer"
                                    aria-selected="false">New Arrivals</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="on-sale-tab" data-bs-toggle="tab" data-bs-target="#on-sale-box"
                                    type="button" role="tab" aria-selected="true">On Sale</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="best-rated-tab" data-bs-toggle="tab"
                                    data-bs-target="#best-rated-box" type="button" role="tab" aria-selected="false">Best
                                    rated</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabs Content Starts-->
        <div class="row mt-40">
            <div class="col-xl-12">
                <div class="tab-content" id="flast-sell-tabContent">
                    <div class="tab-pane fade active show" id="new-arrivals-box" role="tabpanel"
                        aria-labelledby="new-arrivals-tab">
                        <swiper :modules="modules" :slides-per-view="4" :navigation="navigation" :space-between="30"
                            @swiper="onSwiper" @slideChange="onSlideChange" class="product-boxes">
                            <swiper-slide v-for="item in newarrivalsproducts" :key="item.id"
                                class="product-grid p-relative w-img mb-30">
                                <div class="product-image">
                                    <router-link :to="{ name: 'Product', params: { slug: item.slug } }" class="image">
                                        <img class="pic-1" :src="item.file_name">
                                        <img class="pic-2" :src="item.file_name">
                                    </router-link>
                                    <ul class="product-links">
                                        <li>
                                            <a href="#">
                                                <i class="bi bi-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="icon-box" data-bs-toggle="modal"
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
                                        <router-link :to="{ name: 'Product', params: { slug: item.slug } }">{{
                                            item.product_title
                                        }}</router-link>
                                    </h3>
                                    <div class="rating mb-5 mt-10 justify-content-between">
                                        <ul>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                        </ul>
                                        <span><a href="">01 review</a></span>
                                    </div>
                                    <div class="price">{{ currency }} {{
                                        item.unit_price
                                    }}</div>
                                </div>
                            </swiper-slide>
                            <div class="navigation d-flex justify-content-between">
                                <button class="custom-prev-btn"><i class="bi bi-chevron-left"></i></button>
                                <button class="custom-next-btn"><i class="bi bi-chevron-right"></i></button>
                            </div>
                        </swiper>
                    </div>
                    <!-- New Arrivals Tab Content Ends -->
                    <div class="tab-pane fade" id="on-sale-box" role="tabpanel" aria-labelledby="on-sale-tab">
                        <swiper :modules="modules" :slides-per-view="4" :navigation="navigation" :space-between="30"
                            @swiper="onSwiper" @slideChange="onSlideChange" class="product-boxes">
                            <swiper-slide v-for="item in newarrivalsproducts" :key="item.id"
                                class="product-grid p-relative w-img mb-30">
                                <div class="product-image">
                                    <router-link :to="{ name: 'Product', params: { slug: item.slug } }" class="image">
                                        <img class="pic-1" :src="item.file_name">
                                        <img class="pic-2" :src="item.file_name">
                                    </router-link>
                                    <ul class="product-links">
                                        <li>
                                            <a href="#">
                                                <i class="bi bi-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="icon-box" data-bs-toggle="modal"
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
                                        <router-link :to="{ name: 'Product', params: { slug: item.slug } }">{{
                                            item.product_title
                                        }}</router-link>
                                    </h3>
                                    <div class="rating mb-5 mt-10 justify-content-between">
                                        <ul>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                        </ul>
                                        <span><a href="">01 review</a></span>
                                    </div>
                                    <div class="price">{{ currency }} {{
                                        item.unit_price
                                    }}</div>
                                </div>
                            </swiper-slide>
                            <div class="navigation d-flex justify-content-between">
                                <button class="custom-prev-btn"><i class="bi bi-chevron-left"></i></button>
                                <button class="custom-next-btn"><i class="bi bi-chevron-right"></i></button>
                            </div>
                        </swiper>
                    </div>
                    <div class="tab-pane fade" id="best-rated-box" role="tabpanel" aria-labelledby="best-rated-tab">
                        <swiper :modules="modules" :slides-per-view="4" :navigation="navigation" :space-between="30"
                            @swiper="onSwiper" @slideChange="onSlideChange" class="product-boxes">
                            <swiper-slide v-for="item in newarrivalsproducts" :key="item.id"
                                class="product-grid p-relative w-img mb-30">
                                <div class="product-image">
                                    <router-link :to="{ name: 'Product', params: { slug: item.slug } }" class="image">
                                        <img class="pic-1" :src="item.file_name">
                                        <img class="pic-2" :src="item.file_name">
                                    </router-link>
                                    <ul class="product-links">
                                        <li>
                                            <a href="#">
                                                <i class="bi bi-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="icon-box" data-bs-toggle="modal"
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
                                        <router-link :to="{ name: 'Product', params: { slug: item.slug } }">{{
                                            item.product_title
                                        }}</router-link>
                                    </h3>
                                    <div class="rating mb-5 mt-10 justify-content-between">
                                        <ul>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                            <li><a href="#"><i class="bi bi-star"></i></a>
                                            </li>
                                        </ul>
                                        <span><a href="">01 review</a></span>
                                    </div>
                                    <div class="price">{{ currency }} {{
                                        item.unit_price
                                    }}</div>
                                </div>
                            </swiper-slide>
                            <div class="navigation d-flex justify-content-between">
                                <button class="custom-prev-btn"><i class="bi bi-chevron-left"></i></button>
                                <button class="custom-next-btn"><i class="bi bi-chevron-right"></i></button>
                            </div>
                        </swiper>
                    </div>
                </div>
            </div>
        </div>
        <!--Tabs Content Ends-->
    </section>
</template>
<script>
import { Swiper } from "@/../../node_modules/swiper/vue/swiper";
import { SwiperSlide } from "@/../../node_modules/swiper/vue/swiper-slide";
import { Navigation } from "@/../../node_modules/swiper";
// Import Swiper styles
import "@/../../node_modules/swiper/swiper.min.css";
export default {
    name: 'NewArrivals',
    components: {
        Swiper,
        SwiperSlide,
    },
    data() {
        return {
            newarrivalsproducts: [],
            currency: "",
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
        get_newarrivalsproducts() {
            this.loading = true;

            try {
                axios.get('/api/new_arriaval_products').then(({ data }) => {
                    this.newarrivalsproducts = data.data.data;
                    this.currency = data.currency;
                    //console.log(data.data);
                });
            } catch (error) {

            } finally {
                this.loading = false
            }
        }
    },
    mounted() {
        this.get_newarrivalsproducts();
    }
}
</script>

<style scoped>
.section-heading:before {
    background: none!important;
}
.product-nav-tabs .nav-link {
    padding-bottom: 15px;
}
.product-nav-tabs .nav-link.active:before {
    content: "";
    position: absolute;
    bottom: 0;
    height: 5px;
    width: 50px;
    background: var(--color-primary);
    z-index: 2;
}
.product-boxes {
    position: relative;
}
.navigation {
    position: absolute;
    top: 45%;
    z-index: 1;
    width:100%;
}
.navigation button {
    background-color: var(--bg-color-4);
    padding: 5px 10px;
}
.navigation .custom-prev-btn {
    left: 0px;
}
.navigation .custom-next-btn {
    right: 0px;
}
</style>