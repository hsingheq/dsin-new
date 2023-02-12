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
        <div class="col-xl-3 col-lg-4">
            <form action="">
              Filters
            </form>
        </div>
      <!-- Sidebar Ends -->
      <!-- Posts Starts -->
      <div class="col-xl-9 col-lg-8">
          <div class="row g-4" v-if="posts && posts.length > 0">
            <!-- Blog Item Starts-->
            <div class="col-lg-4 col-md-6 mb-40" v-for="item in posts" :key="item.id">
              <div class="card blog-categority">
                <router-link :to="{name:'BlogPost',params:{slug:item.slug}}" class="blog-img sliderBackground bg-size" style="background-image: url('https://mdbootstrap.com/img/new/standard/nature/184.jpg');">
                  <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt="" class="card-img-top bg-img d-none">
                </router-link>
                <div class="card-body">
                  <h5>Post Category</h5>
                  <router-link :to="{name:'BlogPost',params:{slug:item.slug}}">
                    <h2 class="card-title">{{ item.title }}</h2>
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
          <div v-else>
            <div class="alert alert-warning">No post found!</div>
          </div>
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
  
  export default {
  
    name: "Blog",
    data(){
        return {
            posts:{
                type:Object,
                default:null
            }
        }
    },
    mounted(){
        this.list()
    },
    methods:{
        async list(page=1){
            await axios.get(`/api/post_list`).then(res=>{
                this.posts = res.data.response
                //alert(res.data.response.length);
                console.log(res.data.response)
            });
        }
    },
    /*async mounted(){
      //const route = useRoute();
        //console.log(route.params.slug);
        await axios.get('/api/post_list').then(res=>{
            this.posts = res.data.response;
            if(res.data.response.length==0) {
              this.noposts=true;
            }
            //console.log(res.data.response.length);
        });
  
     // axios.get();
    }*/
  }
</script>
<style>
.post-item {
  border: 1px solid #eee;
}
.post-item .post-content{
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
</style>