<template>
  <!-- Breadcrumbs Starts -->
  <loading v-model:active="isLoading" :can-cancel="true" :on-cancel="onCancel" :is-full-page="fullPage" />
  <section class="box-plr-75">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12">
          <div class="breadcrumb-wrapper">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumbs Ends -->
  <!-- Content Starts -->
  <section class="shop-area mb-20 py-50">
    <div class="container">
      <div class="row">
        <!-- Sidebar Starts -->
        <!--<div class="col-xl-3 col-lg-4">
          <form action="">
            Filters
          </form>
        </div>-->
        <!-- Sidebar Ends -->
        <!-- Posts Starts -->
        <div class="col-xl-9 col-lg-12">

          <div class="row g-4">
            <!-- Blog Item Starts-->
            <div class="col-lg-4 col-md-6 mb-40" v-for="post in posts.data" :key="post.id">
              <div class="card blog-categority">
                <router-link :to="{ name: 'BlogPost', params: { slug: post.slug } }"
                  class="blog-img sliderBackground bg-size"
                  style="background-image: url('//mdbootstrap.com/img/new/standard/nature/184.jpg');">
                  <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt=""
                    class="card-img-top bg-img d-none">
                </router-link>
                <div class="card-body">
                  <h5>Post Category</h5>
                  <router-link :to="{ name: 'BlogPost', params: { slug: post.slug } }">
                    <h2 class="card-title">{{ post.title }}</h2>
                  </router-link>
                  <div class="blog-profile">
                    <div class="image-name">
                      <h3>John Wick</h3>
                      <h6>15 Aug 2022</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Blog Item Ends-->
          </div>
          <!--<div v-else>
            <div class="alert alert-warning">No post found!</div>
          </div>-->
          <Bootstrap5Pagination align="center" class="mb-30" :data="posts" :limit="2" :show-disabled="false"
            @pagination-change-page="list" />
          <!--<Pagination :data="posts" @pagination-change-page="posts" />-->
        </div>
        <!-- Posts Ends -->
      </div>
    </div>
  </section>
  <!-- Content Ends -->
</template>
<script>
import { ref } from 'vue';

import axios from 'axios';
import { useRoute, useRouter } from 'vue-router';
import router from '@/router';
import Bootstrap5Pagination from 'laravel-vue-pagination';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/css/index.css';
export default {
  name: "Blog",
  data() {
    return {
      posts: {
        type: Object,
        default: null
      },
      isLoading: true,
      fullPage: true
    }
  },
  components: {
    Loading,
    Bootstrap5Pagination
    //'Pagination': LaravelVuePagination
  },
  beforeMount() {

  },
  mounted() {
    this.list()
  },
  methods: {
    async list(page = 1) {
      this.isLoading = true
      await axios.get(`/api/blogs?page=${page}`).then(response => {
        this.posts = response.data.response
        this.isLoading = false
        // alert(res.data.response.per_page);
        console.log(response.data)
      });
    }
  },
}
</script>
<style>
.post-item {
  border: 1px solid #eee;
}

.post-item .post-content {
  padding: 20px;
}

.blog-categority {
  padding: 0;
  border: none;
  background-color: #fff;
}

.blog-categority .blog-img {
  border-radius: 5px;
  position: relative;
  overflow: hidden;
  background-position: center;
}

.blog-categority .blog-img:after {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  background: #0163d2;
  background: var(--theme-color);
  opacity: 0;
  transition: all .5s ease;
}

.blog-categority:hover .blog-img:after {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  background: #0163d2;
  opacity: .2;
  transition: all .5s ease;
}

.bg-size:before {
  padding-top: 66.66%;
  content: "";
  display: block;
}

.blog-categority .card-body h5 {
  color: #0163d2;
  color: var(--theme-color);
  margin-bottom: 6px;
}

.blog-categority .card-body h2 {
  font-weight: 500;
  line-height: 1.3;
  font-size: calc(14.8px + .0625vw);
  margin-bottom: calc(4px + 0.625vw);
  color: #212529;
}

.blog-categority .card-body .blog-profile {
  display: flex;
  align-items: center;
}

.blog-categority .card-body .blog-profile .image-name {
  margin-left: 0;
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  grid-gap: 10px;
  gap: 10px;
}

.blog-categority .card-body .blog-profile .image-name h3 {
  position: relative;
  font-size: calc(13.6px + .125vw);
  margin-top: 0;
  margin-bottom: 0;
  color: #7e7e7e;
  font-weight: 400;
  padding-right: 10px;
  border-right: 1px solid #ddd;
}

.blog-categority .card-body .blog-profile .image-name h6 {
  color: #7e7e7e;
  margin-bottom: 0;
  font-size: calc(13.6px + .125vw);
  font-weight: 400;
}

.page-item.active .sr-only {
  display: none;
}

.pagination {
  display: flex;
  column-gap: 15px;
}

.pagination .page-link:focus {
  z-index: 3;
  color: #0a58ca;
  background-color: #e9ecef;
  outline: 0;
  box-shadow: none;
}

.paginate-buttons {
  height: 40px;
  width: 40px;
  border-radius: 20px;
  cursor: pointer;
  background-color: rgb(242, 242, 242);
  border: 1px solid rgb(217, 217, 217);
  color: black;
}

.paginate-buttons:hover {
  background-color: #d8d8d8;
}

.active-page {
  background-color: #3498db;
  border: 1px solid #3498db;
  color: white;
}

.active-page:hover {
  background-color: #2988c8;
}
</style>