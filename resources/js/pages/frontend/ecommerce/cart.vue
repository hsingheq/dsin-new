<template>
    <div>
                
        <!-- Breadcrumbs Starts -->
		<breadcrumb v-bind:page_name="page_name">
		</breadcrumb>
<!-- Breadcrumbs Ends -->
        <section class="pb-50">
	<div class="container">
		<div class="row">
           
			<div class="col-lg-12">
				<div class="card">
					<div class="row">
                    
						<div class="col-md-8 cart">
                          
							<div class="title">
								<div class="p-4 d-flex justify-content-between align-items-center">
									<h4 class="h4 m-0">Shopping Cart</h4>
									<div class="text-end text-muted">{{ countCartItems }} Item<span v-if=" Cartdata.countCartItems>1">s</span> 
                                    <span v-else></span> 
                                    </div>
								</div>
							</div>    
                            <Loading v-if="loading" />
							<div v-for="item in cartItems" :key="item.id" class="row border-top border-bottom">
								<div class="row d-flex align-items-center">
									<div class="col-2"><img class="img-fluid" :src="base_url+item.file_name" /></div>
									<div class="col">
										<div class="row text-muted">{{ item.product_title }}</div>
										<div class="row">{{ item.product_title }}</div>
									</div>
									<div class="col">
										<a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
									</div>
									<div class="col text-end">RM {{ item.unit_price }} <span class="close">&#10005;</span></div>
								</div>
							</div>
							<!-- <div class="row">
								<div class="row d-flex align-items-center">
									<div class="col-2"><img class="img-fluid" src="https://i.imgur.com/ba3tvGm.jpg"></div>
									<div class="col">
										<div class="row text-muted">Shirt</div>
										<div class="row">Cotton T-shirt</div>
									</div>
									<div class="col">
										<a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
									</div>
									<div class="col text-end">RM 44.00 <span class="close">&#10005;</span></div>
								</div>
							</div> -->
							<!-- <div class="row border-top border-bottom">
								<div class="row d-flex align-items-center">
									<div class="col-2"><img class="img-fluid" src="https://i.imgur.com/pHQ3xT3.jpg"></div>
									<div class="col">
										<div class="row text-muted">Shirt</div>
										<div class="row">Cotton T-shirt</div>
									</div>
									<div class="col">
										<a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
									</div>
									<div class="col text-end">RM 44.00 <span class="close">&#10005;</span></div>
								</div>
							</div> -->
							<div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
						</div>
						<div class="col-md-4 summary">
							<div><h5><b>Summary</b></h5></div>
							<hr>
							<div class="row">
								<div class="col" style="padding-left:0;">ITEMS 3</div>
								<div class="col text-right">&euro; 132.00</div>
							</div>
							<form>
								<p>SHIPPING</p>
								<select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
								<p>GIVE CODE</p>
								<input id="code" placeholder="Enter your code">
							</form>
							<div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
								<div class="col">TOTAL PRICE</div>
								<div class="col text-right">&euro; 137.00</div>
							</div>
							<button class="btn">CHECKOUT</button>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>	
    </div>
</template>

<script>
import {ref,reactive} from 'vue';
import axios from 'axios';
import { useRoute, useRouter } from 'vue-router';
import { UserStore } from '@/store/UserStore';
import { useShoppingStore } from '@/store/CartStore'; 
import { mapState } from 'pinia';
import Loading from '@/layouts/partials/loaderComponent.vue';
import breadcrumb from '@/layouts/partials/breadCrumbComponent.vue';
const base_url = import.meta.env.VITE_MY_ENV_VARIABLE;
export default{
    created(){
        this.getCartItems()
    },

    computed:{
       
        ...mapState(useShoppingStore,['countCartItems'])
    },
    data(){
        return{
            cartItems: [],
            base_url,
            loading:false
        }
    },
    methods:{
        async getCartItems(){
            this.loading=true;
            try{
                await axios.post('/api/getCartItems',{
                user_id:2
            }).then(res=>{
            this.cartItems = res.data.response;
            });
            }catch(error){
                console.log(error);
            }finally{
                this.loading=false
            }
        
        }
    },


    setup(){


        const page_name = ref('Cart');
       const Cartdata = useShoppingStore();

        return {
            page_name,
            Cartdata
        }
    },
    components:{
        breadcrumb,
        Loading
    }
}
</script>
