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
  <section class="shop-area mb-20 py-50">
    <div class="container">
      <div class="row">
        <h1>{{ post.title }}</h1>
        <p class="time-and-author">
          {{ post.published_date }}
          <span>Written By {{ post.user }}</span>
        </p>
        <div class="single-blog-post-ContentImage" data-aos="fade-left">
          <img :src="`/${post.imagePath}`" alt="" />
        </div>
        <div class="about-text">
          <p>
            {{ post.body }}
          </p>
        </div>
      </div>
    </div>
  </section>
  <!--<section class="recommended">
    <p>Related Posts</p>
    <div class="recommended-cards">
      <router-link v-for="relatedPost in relatedPosts" :key="relatedPost.id" :to="{
        name: 'SingleBlog',
        params: { slug: relatedPost.slug },
      }">
        <div class="recommended-card">
          <img :src="`/${relatedPost.imagePath}`" alt="" loading="lazy" />
          <h4>{{ relatedPost.title }}</h4>
        </div>
      </router-link>
    </div>
  </section>-->
</template>
  
<script>
import axios from 'axios';
import { useRoute } from 'vue-router';
import router from '@/router';

export default {

  name: "Blog",
  data() {
    return {
      post: {},
      relatedPosts: [],
    }
  },
  async mounted() {
    const route = useRoute();
    //console.log(route.params.slug);
    await axios.post('/api/get_post', {
      slug: route.params.slug
    }).then(response => {
      this.post = response.data.data;
      // console.log(res.data.response.product_title);
    });

    // axios.get();
  }
}
</script>
  
<style scoped>
.container {
  text-align: center;
  padding-top: 100px;
  min-height: 300px;

}
</style>
  
  