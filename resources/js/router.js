import { createWebHistory, createRouter } from "vue-router";
import index from './pages/frontend/index.vue';


const routes =  [
    {
        path :  '/',
        name : '/',
        component : index
    },

    {
        path :  '/index',
        name : 'index',
        component : index
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import("./pages/frontend/login.vue"),
        meta:{
            requiredAuth:false
        }
    }, 
    
    {
        path: '/my-account',
        name: 'MyAccount',
         component:() => import("./pages/frontend/customer/myAccount.vue"),
      
        meta:{
                requiredAuth:true
        } 
    },

   {
        path: '/edit-customer',
        name: 'editCustomer',
         component:() => import("./pages/frontend/customer/editCustomer.vue"),
        meta:{
                requiredAuth:true
        } 
    },
    {
        path: '/manage-wallet',
        name: 'manage-wallet',
         component:() => import("./pages/frontend/customer/editCustomer.vue"),
        meta:{
                requiredAuth:true
        } 
    },
    {
        path: '/register',
        name: 'Register',
        component:() => import("./pages/frontend/register.vue"),
        meta:{
                requiredAuth:false
        } 
    },
	{
        path: '/edit-profile',
        name: 'editProfile',
        component:() => import("./pages/frontend/edit-profile.vue"),
        meta:{
                requiredAuth:true
        } 
    },
	{
        path: '/change-password',
        name: 'ChangePassword',
        component:() => import("./pages/frontend/change-password.vue"),
        meta:{
                requiredAuth:true
        } 
    },
	{
        path: '/vending-machines',
        name: 'UserVendingMachines',
        component:() => import("./pages/frontend/user-vending-machines.vue"),
        meta:{
                requiredAuth:true
        } 
    },
	{
        path: '/order-history',
        name: 'OrderHistory',
        component:() => import("./pages/frontend/order-history.vue"),
        meta:{
                requiredAuth:true
        } 
    },
	{
        path: '/wallet-history',
        name: 'UserWallet',
        component:() => import("./pages/frontend/user-wallet.vue"),
        meta:{
                requiredAuth:true
        } 
    },
	{
        path: '/payment-methods',
        name: 'PaymentMethods',
        component:() => import("./pages/frontend/payment-methods.vue"),
        meta:{
            requiredAuth:true
        } 
    },
	{
        path: '/dealer-registration',
        name: 'DealerRegistration',
        component:() => import("./pages/frontend/dealer-registration-form.vue"),
        meta:{
                requiredAuth:true
        } 
    },

/*CATEGORY ROUTINGS*/
    {
       
        name: 'ProductCategory',
        path: '/shop/category/:slug',
        component:() => import("./pages/frontend/ecommerce/category.vue"),
        /* meta:{
                requiredAuth:false
        }  */
    },

    //cart 

    {
       
        name: 'Cart',
        path: '/shop/cart/',
        component:() => import("./pages/frontend/ecommerce/cart.vue"),
        meta:{
                requiredAuth:false
        } 
    },

    /*PRODUCTS ROUTINGS*/
    {
       
        name: 'Product',
        path: '/product/:slug',
        component:() => import("./pages/frontend/ecommerce/SingleProduct.vue"),
    },

    /*BRANDS ROUTINGS*/
    {
       
        name: 'Brand',
        path: '/shop/brand/:slug',
        component:() => import("./pages/frontend/ecommerce/brand.vue"),
       /*  meta:{
                requiredAuth:false
        }  */
    },


    /*POST ROUTINGS*/
    {
       //post section 
        name: 'BlogPost',
        path: '/blog/post/:slug',
        component:() => import("./pages/frontend/blog/post.vue"),
        /* meta:{
                requiredAuth:false
        }  */
    },


    /*POSTs ROUTINGS*/
    {
        //post section 
         name: 'Blog',
         path: '/blog',
         component:() => import("./pages/frontend/blog/postList.vue"),
        
     },
    //CMS pages 

    {
        //about section 
         name: 'About',
         path: '/about',
         component:() => import("./pages/frontend/cms/about.vue"),
          
     },


     {
        //contact section 
         name: 'Contact',
         path: '/contact',
         component:() => import("./pages/frontend/cms/contact.vue"),
        
     },


     
     {
        //disclaimer section 
         name: 'Disclaimer',
         path: '/disclaimer',
         component:() => import("./pages/frontend/cms/disclaimer.vue"),
          
     },


      
     {
        //disclaimer section 
         name: 'PrivacyPolicy',
         path: '/privacy-policy',
         component:() => import("./pages/frontend/cms/privacy-policy.vue"),
         
     },

     {
        //tmc section 
         name: 'Tmc',
         path: '/terms-conditions',
         component:() => import("./pages/frontend/cms/tmc.vue"),
         
     },


     {
        //cart section 
         name: 'Cart',
         path: '/cart',
         component:() => import("./pages/frontend/ecommerce/cart.vue"),
        /*  meta:{
                 requiredAuth:true
         }  */
     },
     {
        path: '/checkout',
        name: 'Checkout',
        component: () => import("./pages/frontend/ecommerce/checkout.vue"),
    }, 
     {
        path: '/wishlist',
        name: 'Wishlist',
        component: () => import("./pages/frontend/wishlist.vue"),
        meta:{
            requiredAuth:true
        }
    }, 
    {
        path: '/:pathMatch(.*)*',
        name: 'PageNotFound',
        component: () => import('./pages/frontend/404.vue')
    }
];
const router = createRouter({
    history: createWebHistory(),
    mode:'history',
    routes
});

router.beforeEach((to,from) => {
    if(to.meta.requiredAuth && !sessionStorage.getItem('token')){
        return { name: 'Login' }
    }
    if(to.meta.requiredAuth==false && sessionStorage.getItem('token')){
            return { name:'MyAccount' }
    }
})


export default router;