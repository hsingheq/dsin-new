import {ref,onMounted} from 'vue';
import { defineStore } from 'pinia'
import axios from 'axios';


export const useShoppingStore = defineStore('shopping', {
    state: () =>({
        countCartItems:null,
        user_id:null
    }) ,
    getters: {
        // countCartItems(){
        //    /*  return this.cartItems.length; */
        //      return this.cartItems;
             
        // },
     /*    cartcount: (state) => state.cartItems, */
       /*  getCartItems(){
            return this.cartItems;
        } */
    },
    actions: {

        async CartItems(){
            if(sessionStorage.getItem('token')){
                const res = await  axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                    },
    
                }).then( ({data})=>{
                    
                    
                 this.user_id=data.id
                   
                      
                }); 
            }
            try{
                await axios.post('/api/getCartItemsCount',{
                    user_id:this.user_id
                }).then(res=>{
                    this.countCartItems = res.data.response.length
                
                });
            }catch(error){
                console.log(error);
            }
            
    },



      async addToCart(product_id,quantity,uid) {
            await axios.post('/api/addToCart',{
                product_id:product_id,
                quantity:1,
                uid:uid
            }).then(res=>{
                console.log("Product has added to cart!!!");
                this.CartItems();
            }) 
          
           /*  let index = this.cartItems.findIndex(product => product.id === item.id);
            if(index !== -1) {
              this.products[index].quantity += 1; */
             /*  Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your item has been updated',
                showConfirmButton: false,
                timer: 1500
              }); */
           // }else {
             /*  item.quantity = 1;
              this.cartItems.push(item); */
            //   Swal.fire({
            //     position: 'top-end',
            //     icon: 'success',
            //     title: 'Your item has been saved',
            //     showConfirmButton: false,
            //     timer: 1500
            //   });
            },
          
          
        },
       
        incrementQ(item) {
            let index = this.cartItems.findIndex(product => product.id === item.id);
            if(index !== -1) {
                this.cartItems[index].quantity += 1;
                // Swal.fire({
                //     position: 'top-end',
                //     icon: 'success',
                //     title: 'Your item has been updated',
                //     showConfirmButton: false,
                //     timer: 1500
                // });
            }
        },
        decrementQ(item) {
            let index = this.cartItems.findIndex(product => product.id === item.id);
            if(index !== -1) {
                this.cartItems[index].quantity -= 1;
                if(this.cartItems[index].quantity === 0){
                    this.cartItems = this.cartItems.filter(product => product.id !== item.id);
                }
                // Swal.fire({
                //     position: 'top-end',
                //     icon: 'success',
                //     title: 'Your item has been updated',
                //     showConfirmButton: false,
                //     timer: 1500
                // });
            }
        },
        removeFromCart(item) {
            this.cartItems = this.cartItems.filter(product => product.id !== item.id);
            // Swal.fire({
            //   position: 'top-end',
            //   icon: 'success',
            //   title: 'Your item has been removed',
            //   showConfirmButton: false,
            //   timer: 1500
            // });
        }

    


        
    })
// })