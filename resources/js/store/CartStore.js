import {ref,onMounted} from 'vue';
import { defineStore } from 'pinia'
import axios from 'axios';


export const useShoppingStore = defineStore('shopping', {
    state: () =>({
        countCartItems:null,
        user_id:null
    }) ,
    getters: {
        countCartItems(){
            if(localStorage.getItem('products')){
				var stor = localStorage.getItem('products');
				if(stor){
					var dd = JSON.parse(stor);
                    return dd.length;
				}
			}
        }
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

        CartItems(){
            if(localStorage.getItem('products')){
				var stor = localStorage.getItem('products');
				if(stor){
					return JSON.parse(stor);
				}
			}
            
            return [];
    },



      addToCart(product) {
            if(localStorage.getItem('products')){
                var stor = localStorage.getItem('products');
                if(stor){
                    var product_array = JSON.parse(stor);
                    product_array.push(product);
                    localStorage.setItem('products', JSON.stringify(product_array));
                }else{
                    localStorage.setItem('products', JSON.stringify([product]));
                }
            }else{
                localStorage.setItem('products', JSON.stringify([product]));
            }
            this.countCartItems();
            // await axios.post('/api/addToCart',{
            //     product_id:product_id,
            //     quantity:1,
            //     uid:uid
            // }).then(res=>{
            //     console.log("Product has added to cart!!!");
            //     this.CartItems();
            // }) 
          
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