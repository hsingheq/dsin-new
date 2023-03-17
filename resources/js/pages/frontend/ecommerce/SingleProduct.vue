<template>
  <!-- Breadcrumbs Starts -->
  <section class="box-plr-75">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="breadcrumb-wrapper">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Product Details
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumbs Ends -->
  <!-- Content Starts -->
  <!-- Product Details Starts -->
  <div class="product-details">
    <div class="container">
      <div class="row">
        <div class="col-xl-6">
          <div class="product-details-nav d-sm-flex align-items-start">
            <div class="product-details-thumb">
              <div class="tab-content" id="productThumbContent">
                <div
                  class="tab-pane fade"
                  id="thumbOne"
                  role="tabpanel"
                  aria-labelledby="thumbOne-tab"
                >
                  <div class="product-details-nav-thumb w-img">
                    <img src="@/asset/images/products/product-1.jpg" alt="" />
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="thumbTwo"
                  role="tabpanel"
                  aria-labelledby="thumbTwo-tab"
                >
                  <div class="product-details-nav-thumb w-img">
                    <img src="@/asset/images/products/product-1.jpg" alt="" />
                  </div>
                </div>
                <div
                  class="tab-pane fade active show"
                  id="thumbThree"
                  role="tabpanel"
                  aria-labelledby="thumbThree-tab"
                >
                  <div class="product-details-nav-thumb w-img">
                    <img src="@/asset/images/products/product-1.jpg" alt="" />
                  </div>
                </div>
              </div>

              <ul class="nav nav-tabs" id="productThumbTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="thumbOne-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#thumbOne"
                    type="button"
                    role="tab"
                    aria-controls="thumbOne"
                    aria-selected="false"
                  >
                    <img
                      src="@/asset/images/products/product-1.jpg"
                      alt=""
                      height="50"
                    />
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link"
                    id="thumbTwo-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#thumbTwo"
                    type="button"
                    role="tab"
                    aria-controls="thumbTwo"
                    aria-selected="false"
                  >
                    <img
                      src="@/asset/images/products/product-1.jpg"
                      alt=""
                      height="50"
                    />
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button
                    class="nav-link active"
                    id="thumbThree-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#thumbThree"
                    type="button"
                    role="tab"
                    aria-controls="thumbThree"
                    aria-selected="true"
                  >
                    <img
                      src="@/asset/images/products/product-1.jpg"
                      alt=""
                      height="50"
                    />
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="product__details-content">
            <h6 class="title" v-html="product.product_title"></h6>
            <div class="pd-rating mb-10">
              <ul class="rating">
                <li>
                  <a href="#"><i class="bi bi-star"></i></a>
                </li>
                <li>
                  <a href="#"><i class="bi bi-star"></i></a>
                </li>
                <li>
                  <a href="#"><i class="bi bi-star"></i></a>
                </li>
                <li>
                  <a href="#"><i class="bi bi-star"></i></a>
                </li>
                <li>
                  <a href="#"><i class="bi bi-star"></i></a>
                </li>
              </ul>
              <span>01 review</span>
              <!--<span>
							<a href="#">Add your review</a>
						</span>-->
            </div>
            <div class="price mb-10">
              <currencyformat :value="product.unit_price" />
            </div>
            <div class="features-des mb-20 mt-10">
              <ul>
                <li>
                  <a href="product-details.html">
                    <i class="fas fa-circle"></i> Bass and Stereo Sound.
                  </a>
                </li>
                <li>
                  <a href="product-details.html">
                    <i class="fas fa-circle"></i> Display with 3088 x 1440
                    pixels resolution.
                  </a>
                </li>
                <li>
                  <a href="product-details.html">
                    <i class="fas fa-circle"></i> Memory, Storage &amp; SIM:
                    12GB RAM, 256GB.
                  </a>
                </li>
                <li>
                  <a href="product-details.html">
                    <i class="fas fa-circle"></i> Androi v10.0 Operating system.
                  </a>
                </li>
              </ul>
            </div>
            <div class="product-stock mb-20">
              <h5>Availability: <span> 940 in stock</span></h5>
            </div>
            <div class="cart-option mb-15">
              <!--<div class="product-quantity mr-20">
								<div class="cart-plus-minus p-relative">
									<input type="text" value="1">
									<div class="dec qtybutton">-</div>
									<div class="inc qtybutton">+</div>
									<div class="dec qtybutton">-</div>
									<div class="inc qtybutton">+</div>
								</div>
							</div>-->
              <numbercontrol :value="1" :min="1" :product="product" />
              <button
                type="button"
                class="cart-btn-2 ml-30 mb-10"
                @click="pid(product)"
              >
                Add to Cart
              </button>
            </div>
            <div class="details-meta">
              <div class="d-meta-left">
                <div class="dm-item mr-20">
                  <a href="#"> <i class="bi bi-heart"></i>Add to wishlist </a>
                </div>
              </div>
              <div class="d-meta-left">
                <div class="dm-item">
                  <a href="#"> <i class="bi bi-share"></i>Share </a>
                </div>
              </div>
            </div>
            <div class="product-tag-area mt-15">
              <div class="product_info">
                <span class="sku_wrapper">
                  <span class="title">SKU:</span>
                  <span class="sku">DK1002</span>
                </span>
                <span class="posted_in">
                  <span class="title">Categories:</span>
                  <a href="#">iPhone</a>
                  <a href="#">Tablets</a>
                </span>
                <span class="tagged_as">
                  <span class="title">Tags:</span>
                  <a href="#">Smartphone</a>, <a href="#">Tablets</a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product Details Ends -->
  <!-- Product Details Descriptions Starts -->
  <div class="product-details-des mt-40 mb-60">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="product__details-des-tab">
            <ul class="nav nav-tabs" id="productDesTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="des-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#des"
                  type="button"
                  role="tab"
                  aria-controls="des"
                  aria-selected="true"
                >
                  Description
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="aditional-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#aditional"
                  type="button"
                  role="tab"
                  aria-controls="aditional"
                  aria-selected="false"
                >
                  Additional information
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="review-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#review"
                  type="button"
                  role="tab"
                  aria-controls="review"
                  aria-selected="false"
                >
                  Reviews (1)
                </button>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="tab-content" id="prodductDesTaContent">
        <div
          class="tab-pane fade active show"
          id="des"
          role="tabpanel"
          aria-labelledby="des-tab"
        >
          <div class="product__details-des-wrapper">
            <p class="des-text mb-35">
              Designed by Hans J. Wegner in 1949 as one of the first models
              created especially for Carl Hansen &amp; Son, and produced since
              1950. The last of a series of chairs wegner designed based on
              inspiration from antique Chinese armchairs. The gently rounded top
              together with the back and seat offers a variety of comfortable
              seating positions,ideal for both long visits to the dining table
              and relaxed lounging.
            </p>
            <h6 class="des-sm-title">
              The standard passage, used since the 1500s.
            </h6>
            <p class="des-text mb-35">
              A light chair, easy to move around the dining table and about the
              room. Duis aute irure dolor in reprehenderit in voluptate velit
              esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit
              amet conse ctetur adipisicing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua. Sit amet conse ctetur
              adipisicing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
              exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.
            </p>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="aditional"
          role="tabpanel"
          aria-labelledby="aditional-tab"
        >
          <div class="product__desc-info">
            <ul>
              <li>
                <h6>Weight</h6>
                <span>2 lbs</span>
              </li>
              <li>
                <h6>Dimensions</h6>
                <span>12 × 16 × 19 in</span>
              </li>
              <li>
                <h6>Product</h6>
                <span>Purchase this product on rag-bone.com</span>
              </li>
              <li>
                <h6>Color</h6>
                <span>Gray, Black</span>
              </li>
              <li>
                <h6>Size</h6>
                <span>S, M, L, XL</span>
              </li>
              <li>
                <h6>Model</h6>
                <span>Model </span>
              </li>
              <li>
                <h6>Shipping</h6>
                <span>Standard shipping: $5,95</span>
              </li>
              <li>
                <h6>Care Info</h6>
                <span>Machine Wash up to 40ºC/86ºF Gentle Cycle</span>
              </li>
              <li>
                <h6>Brand</h6>
                <span>Kazen</span>
              </li>
            </ul>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="review"
          role="tabpanel"
          aria-labelledby="review-tab"
        >
          <div class="product__details-review">
            <div class="row">
              <div class="col-xl-4">
                <div class="review-rate">
                  <h5>5.00</h5>
                  <div class="review-star">
                    <a href="#"><i class="bi bi-star-fill"></i></a>
                    <a href="#"><i class="bi bi-star-fill"></i></a>
                    <a href="#"><i class="bi bi-star-fill"></i></a>
                    <a href="#"><i class="bi bi-star-fill"></i></a>
                    <a href="#"><i class="bi bi-star-fill"></i></a>
                  </div>
                  <span class="review-count">01 Review</span>
                </div>
              </div>
              <div class="col-xl-8">
                <div class="review-des-infod">
                  <h6>
                    1 review for " <span>Brother LC-3617 Black Ink</span>"
                  </h6>
                  <div class="review-details-des">
                    <div class="author-image mr-15">
                      <a href="#">
                        <img src="@/asset/images/user.png" height="80" alt="" />
                      </a>
                    </div>
                    <div class="review-details-content">
                      <div class="str-info">
                        <div class="review-star mr-15">
                          <a href="#"><i class="bi bi-star"></i></a>
                          <a href="#"><i class="bi bi-star"></i></a>
                          <a href="#"><i class="bi bi-star"></i></a>
                          <a href="#"><i class="bi bi-star"></i></a>
                          <a href="#"><i class="bi bi-star"></i></a>
                        </div>
                        <div class="add-review-option">
                          <a href="#">Add Review</a>
                        </div>
                      </div>
                      <div class="name-date mb-30">
                        <h6>admin – <span> Desc 22, 2022</span></h6>
                      </div>
                      <p>
                        A light chair, easy to move around the dining table and
                        about the room. Duis aute irure dolor in reprehenderit
                        in <br />
                        voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-12">
                <div class="product__details-comment">
                  <div class="comment-title mb-20">
                    <h3>Add a review</h3>
                    <p>
                      Your email address will not be published. Required fields
                      are marked *
                    </p>
                  </div>
                  <div class="comment-rating mb-20">
                    <span>Overall ratings</span>
                    <ul>
                      <li>
                        <a href="#"><i class="bi bi-star"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="bi bi-star"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="bi bi-star"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="bi bi-star"></i></a>
                      </li>
                      <li>
                        <a href="#"><i class="bi bi-star"></i></a>
                      </li>
                    </ul>
                  </div>
                  <div class="comment-input-box">
                    <form action="#">
                      <div class="row">
                        <div class="col-xxl-6 col-xl-6">
                          <div class="comment-input">
                            <input type="text" placeholder="Your Name" />
                          </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6">
                          <div class="comment-input">
                            <input type="email" placeholder="Your Email" />
                          </div>
                        </div>
                        <div class="col-xxl-12">
                          <textarea
                            placeholder="Your review"
                            class="comment-input comment-textarea"
                          ></textarea>
                        </div>
                        <div class="col-xxl-12">
                          <div
                            class="comment-agree d-flex align-items-center mb-25"
                          >
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="flexCheckDefault"
                              />
                              <label
                                class="form-check-label"
                                for="flexCheckDefault"
                              >
                                Save my name, email, and website in this browser
                                for the next time I comment.
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-xxl-12">
                          <div class="comment-submit">
                            <button type="submit" class="cart-btn">
                              Submit
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Product Details Descriptions Ends -->

  <!-- Related Products Section Starts -->
  <section class="pt-20 pb-50">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading d-flex justify-content-between">
            <h5>Related Products</h5>
            <!--<div class="button-wrap">							
                        <a href="">View All <i class="bi bi-arrow-right"></i></a>
                    </div>-->
          </div>
        </div>
      </div>
      <!-- Products Section Starts -->
      <div class="row mt-40">
        <!-- Product Item 1 Starts -->
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
          <div class="product-item mb-20">
            <div class="product-thumb fix">
              <div class="product-image w-img">
                <a href="">
                  <img
                    src="@/asset/images/products/product-1.jpg"
                    alt="product"
                  />
                </a>
              </div>

              <div class="product-action">
                <a
                  href="#"
                  class="icon-box"
                  data-bs-toggle="modal"
                  data-bs-target="#productModalId"
                >
                  <i class="bi bi-eye"></i>
                </a>
                <a href="#" class="icon-box">
                  <i class="bi bi-heart"></i>
                </a>
              </div>
            </div>
            <div class="product-content">
              <h6>
                <a href="">Brother LC-3617 Black Ink</a>
              </h6>
              <div class="rating mb-5 mt-10 justify-content-between">
                <ul>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                </ul>
                <span><a href="">01 review</a></span>
              </div>
              <div class="price">
                <span>RM 58.00</span>
              </div>
            </div>
            <div class="product-add-cart text-center">
              <button
                type="button"
                class="cart-btn-2 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100"
              >
                Add to Cart
              </button>
            </div>
          </div>
        </div>
        <!-- Product Item 1 Ends -->
        <!-- Product Item 1 Starts -->
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
          <div class="product-item mb-20">
            <div class="product-thumb fix">
              <div class="product-image w-img">
                <a href="">
                  <img
                    src="@/asset/images/products/product-1.jpg"
                    alt="product"
                  />
                </a>
              </div>

              <div class="product-action">
                <a
                  href="#"
                  class="icon-box"
                  data-bs-toggle="modal"
                  data-bs-target="#productModalId"
                >
                  <i class="bi bi-eye"></i>
                </a>
                <a href="#" class="icon-box">
                  <i class="bi bi-heart"></i>
                </a>
              </div>
            </div>
            <div class="product-content">
              <h6>
                <a href="">Brother LC-3617 Black Ink</a>
              </h6>
              <div class="rating mb-5 mt-10 justify-content-between">
                <ul>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                </ul>
                <span><a href="">01 review</a></span>
              </div>
              <div class="price">
                <span>RM 58.00</span>
              </div>
            </div>
            <div class="product-add-cart text-center">
              <button
                type="button"
                class="cart-btn-2 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100"
              >
                Add to Cart
              </button>
            </div>
          </div>
        </div>
        <!-- Product Item 1 Ends -->
        <!-- Product Item 1 Starts -->
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
          <div class="product-item mb-20">
            <div class="product-thumb fix">
              <div class="product-image w-img">
                <a href="">
                  <img
                    src="@/asset/images/products/product-1.jpg"
                    alt="product"
                  />
                </a>
              </div>

              <div class="product-action">
                <a
                  href="#"
                  class="icon-box"
                  data-bs-toggle="modal"
                  data-bs-target="#productModalId"
                >
                  <i class="bi bi-eye"></i>
                </a>
                <a href="#" class="icon-box">
                  <i class="bi bi-heart"></i>
                </a>
              </div>
            </div>
            <div class="product-content">
              <h6>
                <a href="">Brother LC-3617 Black Ink</a>
              </h6>
              <div class="rating mb-5 mt-10 justify-content-between">
                <ul>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                </ul>
                <span><a href="">01 review</a></span>
              </div>
              <div class="price">
                <span>RM 58.00</span>
              </div>
            </div>
            <div class="product-add-cart text-center">
              <button
                type="button"
                class="cart-btn-2 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100"
              >
                Add to Cart
              </button>
            </div>
          </div>
        </div>
        <!-- Product Item 1 Ends -->
        <!-- Product Item 1 Starts -->
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
          <div class="product-item mb-20">
            <div class="product-thumb fix">
              <div class="product-image w-img">
                <a href="">
                  <img
                    src="@/asset/images/products/product-1.jpg"
                    alt="product"
                  />
                </a>
              </div>

              <div class="product-action">
                <a
                  href="#"
                  class="icon-box"
                  data-bs-toggle="modal"
                  data-bs-target="#productModalId"
                >
                  <i class="bi bi-eye"></i>
                </a>
                <a href="#" class="icon-box">
                  <i class="bi bi-heart"></i>
                </a>
              </div>
            </div>
            <div class="product-content">
              <h6>
                <a href="">Brother LC-3617 Black Ink</a>
              </h6>
              <div class="rating mb-5 mt-10 justify-content-between">
                <ul>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="bi bi-star"></i></a>
                  </li>
                </ul>
                <span><a href="">01 review</a></span>
              </div>
              <div class="price">
                <span>RM 58.00</span>
              </div>
            </div>
            <div class="product-add-cart text-center">
              <button
                type="button"
                class="cart-btn-2 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100"
              >
                Add to Cart
              </button>
            </div>
          </div>
        </div>
        <!-- Product Item 1 Ends -->
      </div>
    </div>
  </section>
  <!-- Related Products Section Ends -->

  <!-- Content Ends -->
</template>

<script>
import { useRoute } from "vue-router";
import currencyformat from "@/layouts/partials/components/currency-format.vue";
import numbercontrol from "@/layouts/partials/components/number-control.vue";
export default {
  components: {
    currencyformat,
    numbercontrol,
  },
  data() {
    return {
      product: [],
    };
  },
  beforeMount() {
    const route = useRoute();
    let url = `/api/get_product/` + route.params.slug;
    axios.get(url).then((response) => {
      this.product = response.data.response;
      //console.log(response.data.response);
    });
  },
};
</script>
