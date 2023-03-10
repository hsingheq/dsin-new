import { defineStore } from 'pinia'
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export const useShoppingStore = defineStore('shopping', {
    state: () => {
        return {             
            cartItems : JSON.parse(localStorage.getItem('cart_items')) || []
        }
    },
    getters: {
        countCartItems(){
            return this.cartItems.length;
        },
        getCartItems(){
            return this.cartItems;
        },
    },
    actions: {
        getCartTotal(){
            let total = 0;
            var products = JSON.parse(localStorage.getItem('cart_items'));
            products.forEach((item, i) => {
                total += item.unit_price * item.quantity;
            });
            //console.log()
            return total;
        },
        addToCart(item) {
            
            let index = this.cartItems.findIndex(product => product.id === item.id);
            if(index !== -1) {
              this.cartItems[index].quantity += 1;
              toast("This product has been updated to cart.", {
                type: "info", 
                autoClose: 1500,
              }); 
            }else {
              item.quantity = 1;
              this.cartItems.push(item);
              toast("This product has been added to cart.", {
                type: "success", 
                autoClose: 1500,
              }); 
            }
            localStorage.setItem('cart_items', JSON.stringify(this.cartItems))
        },
        incrementQ(item) {
            let index = this.cartItems.findIndex(product => product.id === item.id);
            if(index !== -1) {
                this.cartItems[index].quantity += 1;
                toast("This product has been updated to cart.", {
                    type: "info", 
                    autoClose: 1500,
                }); 
                localStorage.setItem('cart_items', JSON.stringify(this.cartItems))
            }
        },
        decrementQ(item) {
            let index = this.cartItems.findIndex(product => product.id === item.id);
            if(index !== -1) {
                this.cartItems[index].quantity -= 1;
                if(this.cartItems[index].quantity === 0){
                    this.cartItems = this.cartItems.filter(product => product.id !== item.id);
                }
                toast("This product has been updated to cart.", {
                    type: "info", 
                    autoClose: 1500,
                }); 
                localStorage.setItem('cart_items', JSON.stringify(this.cartItems))
            }
        },
        removeFromCart(item) {
            this.cartItems = this.cartItems.filter(product => product.id !== item.id);
            toast("This product has been removed from cart.", {
                type: "info", 
                autoClose: 1500,
            }); 
            localStorage.setItem('cart_items', JSON.stringify(this.cartItems))
        },
        removeCart() {
            toast("Cart has been cleared.", {
                type: "info", 
                autoClose: 1500,
            }); 
            this.cartItems = [];
            localStorage.setItem('cart_items', JSON.stringify(this.cartItems))
        }
        
    },
})