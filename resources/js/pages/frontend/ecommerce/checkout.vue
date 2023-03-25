<!-- <template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="order-box">
          <img :src="product.image" :alt="product.name" />
          <h2 class="title" v-html="product.name"></h2>
     
          <div class="box">
            <slot>
              <p class="small-text text-muted float-left">
                Product Price : {{ product.unit_price }}
              </p>
            </slot>
        
          <div class="box">
            <slot>
              <p class="small-text text-muted float-right">
                Available Units : {{ product.product_stocks }}
              </p>
            </slot>
          </div>

          <hr />
          <label class="row"
            ><span class="col-md-2 float-left">Quantity: </span
            ><input
              type="number"
              name="units"
              min="1"
              :max="product.units"
              class="form-control"
              v-model="quantity"
              @change="checkUnits"
          /></label>
        </div>
        <br />
        <div>
          <div v-if="!isLoggedIn">
            <h2>You need to login to continue</h2>
            <button class="col-md-4 btn btn-primary float-left" @click="login">
              Login
            </button>
            <button
              class="col-md-4 btn btn-danger float-right"
              @click="register"
            >
              Create an account
            </button>
          </div>
          <div v-else>
            <div class="row">
              <label for="address" class="col-md-3 col-form-label"
                >Delivery Address</label
              >
              <div class="col-md-9">
                <input
                  id="address"
                  type="text"
                  class="form-control"
                  v-model="address"
                  required
                />
              </div>
            </div>
            <br />
            <button
              class="col-md-4 btn btn-sm btn-success float-right"
              v-if="isLoggedIn"
              @click="placeOrder"
            >
              Continue
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template> -->
<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="back-billing">
          <label for="inputAddress" class="form-label-biling"
            >Billing Detail</label
          >
          <!-- <div class="card-body">
            <b-alert show variant="danger" v-if='create_error'>{{create_error}}</b-alert>
    <div :class="['form-group m-1 p-3', (successful ? 'alert-success' : '')]" v-show="successful">
      <span v-if="successful" class="label label-sucess">Transaction Detail Enter Sucessfully</span>
    </div> -->
          <form  class="row g-3" @submit.prevent="handleDealerRegistration">
            <div class="row g-3">
              <div class="col">
                <label for="inputAddress" class="form-label">First Name</label>
                <input
                  type="text"
                  required="required"
                  v-model="first_name"
                  class="form-control"
                  placeholder="First name"
                  aria-label="First name"
                />
              </div>
              <div class="col">
                <label for="inputAddress" class="form-label">Last Name</label>
                <input
                  type="text"
                  required="required"
                  v-model="second_name"
                  class="form-control"
                  placeholder="Last name"
                  aria-label="Last name"
                />
              </div>
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label"
                >Company Name (Optional)</label
              >
              <input
                type="text"
                v-model="company_name"
                required="required"
                class="form-control"
                id="inputcompany"
                placeholder="Enter Company Name"
              />
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Address</label>
              <input
                type="text"
                required="required"
                v-model="address"
                class="form-control"
                id="inputAddress"
                placeholder="House No and Street Number"
              />
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Address 2</label>
              <input
                type="text"
                required="required"
                v-model="address2"
                class="form-control"
                id="inputAddress2"
                placeholder="Area"
              />
            </div>
            <div class="col-md-4">
              <b-form-group
                  id="input-group-city"
                  label="City"
                  label-for="input-city"
                >
                  <b-form-select
                    v-model="city"
                    class=""
                    :options="city_array"
                    value-field="id"
                    text-field="name"
                  >
                    <template v-slot:first>
                      <b-form-select-option :value="0" disabled
                        >-- Select City --</b-form-select-option
                      >
                    </template>
                  </b-form-select>
                </b-form-group>
              <!-- <label for="inputCity" class="form-label">Town/City</label>
              <input
                type="text"
                v-model="city"
                class="form-control"
                id="inputCity" -->
              
            </div>
            <div class="col-md-4">
              <b-form-group
              id="input-group-state_id"
              label="State"
              label-for="input-state_id"
            >
              <b-form-select
                v-model="state"
                class=""
                :options="state_array"
                value-field="id"
                text-field="name"
                @change="getcity"
              >
                <template v-slot:first>
                  <b-form-select-option :value="0" disabled
                    >-- Select State --</b-form-select-option
                  >
                </template>
              </b-form-select>
            </b-form-group>
              <!-- <label for="inputState" class="form-label">State</label>
              <input
                type="text"
                v-model="state"
                class="form-control"
                id="inputCity" -->
          
              <!-- <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
              </select> -->
            </div>
            <!-- <div class="col-md-4">
              <label for="inputZip" class="form-label">Zip</label>
              <input
                type="text"
                v-model="zip"
                class="form-control"
                id="inputZip"
              />
            </div> -->
            <!-- <div class="col-12">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="gridCheck"
                 <label class="form-check-label" for="gridCheck">
                  Check me out
                </label> 
              </div>
            </div> -->
            <div class="row g-3">
              <div class="col-md-4">
                <label for="inputAddress" class="form-label">Phone</label>
                <input
                  type="text"
                  required="required"
                  v-model="phone"
                  maxlength="10"
                  class="form-control"
                  placeholder="Enter Phone no "
                  aria-label="First name"
                />
              </div>
              <div class="col-md-4">
                <label for="inputAddress" class="form-label">Email</label>
                <input
                  type="text"
                  required="required"
                  v-model="email"
                  @blur="validateEmail"
                  class="form-control"
                  placeholder="Enter Email"
                  aria-label="Last name"
                />
              </div>
              <div class="col-md-4">
                <label for="inputAddress" class="form-label">ZIP</label>
                <input
                  type="text"
                  v-model="zip"
                  required="required"
                  class="form-control"
                  placeholder="Enter Zip"
                  aria-label="Zip"
                />
              </div>
              
            </div>
            <div class="row g-3">
            <div class="col-sm-6">
              <div class="beck-billing-billing">
                <input type="radio" value="cod" v-model="payment_mode" checked />
                <label for="one"> Cash On Delivery</label>
                 <br>
                <input type="radio" value="prepaid" v-model="payment_mode" />
                <label for="two"> Prepaid</label>
                <!-- <label>
                    <input type="radio" v-model="paymentMethod" />
                    Cash on Delivery </label
                  ><br />
                  <label>
                    <input type="radio" v-model="payment_mode" :paymentMethod="prepaid" />
                    Prepaid </label><br />
                  <div v-if="payment_mode === 'cashOnDelivery'">
                    <p class="payment_class">
                      Please make sure you have cash ready when the delivery
                      arrives.
                    </p>
                  </div>
                  <div v-else-if="payment_mode === 'prepaid'">
                    <p class="payment_class">
                      You will be redirected to our secure payment gateway to
                      complete your payment.
                    </p>
                </div> -->
              </div>
              <div class="d-grid gap-2">
                <button type="submit"  class="btn btn-primary">PAY</button>
                <p v-if="paymentSuccessful"><h3><b>Payment successful! Thank you for your purchase.</b></h3></p>
              </div>
            </div>
            </div>
            
          </form>
        <!-- </div> -->
        </div>
      </div>
      <div class="col-sm-6">
        <div class="back-billing">
          <label for="inputAddress" class="form-label-biling"
            >Cart Items</label
          >
          <table class="table cart-table">
            <thead>
              <tr class="table-head">
                <th scope="col">Image</th>
                <th scope="col">Product name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
               <tr>
                <!-- <td>{{ item.image }}</td> -->
                <!-- <tr> -->
											<td>
                        
                        <img :src="product.file_name" alt="" v-if="product.file_name">
                     <img src="https://vue.pixelstrap.com/voxo/_nuxt/img/3.4faefb8.jpg" alt="" v-if="!product.file_name">
                      </td>
                <td>{{product.product_title}}</td>
                <td>{{product.unit_price}}</td>
                <td>{{quantity}}</td>
                <td>{{total}}</td>
              </tr>
            </tbody>
          </table>
       
          <!-- <div class="col-12">
            <button type="submit" @submit.prevent="handleDealerRegistration" class="btn btn-primary">Pay</button>
            <p v-if="paymentSuccessful"><h3><b>Payment successful! Thank you for your purchase.</b></h3></p>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      
    </div>
  </div>
</template>
<script>
// import state from "../../api/state.js";
// import city from "../../api/city.js";
export default {
  props: ["pid"],
  data() {
    return {
      items: [],
      address: "",
      quantity: 1,
      isLoggedIn: null,
      product: [],
      company_name:'',
      address2:'',
      city: 0,
      zip:'',
      first_name:"",
      second_name:"",
      payment_mode:"cod",
      phone:"",
      successful: false,
        sortBy: 'date',
        errors_create:[],
        create_error:'',
      email:"",
      city_array: [],
      state: 0,
      state_array: [],
      paymentSuccessful: false,
      paymentMethod: "cashOnDelivery",
      cartData:[],
    };
  },
  mounted() {
    
    this.isLoggedIn = sessionStorage.getItem("token") != null;
    if(sessionStorage.getItem('token')){
      this.getUser();
      this.getbilling_detail();
    }
  },


  beforeMount() {
    var cartData;
    /* Code to detect if localstora ge is supported*/
    cartData = localStorage.getItem("cart_items");
    cartData = JSON.parse(cartData);
    cartData = cartData["0"];
    // console.log("cartData: " + JSON.stringify(cartData));
    // console.log("cartData: " + cartData.id);
    axios.get(`/api/products/${cartData.id}`).then((res) => {
      this.product = res.data.response;
      this.product_id = cartData.id;
      this.product_amount = res.data.response.unit_price;

      this.quantity=cartData.quantity;
      this.total=(this.quantity)*(res.data.response.unit_price)
      console.log(this.product);
      // console.log(cartData.quantity);
      // console.log(res.data.response.product_title);
    });
    //   .then((res) => (this.product = response.data));
    // console.data(response.data);
    // console.log(JSON.stringify(this.product));
    // if (localStorage.getItem("bigStore.jwt") != null) {
    //   this.user = JSON.parse(localStorage.getItem("bigStore.user"));
    //   axios.defaults.headers.common["Content-Type"] = "application/json";
    //   axios.defaults.headers.common["Authorization"] =
    //     "Bearer " + localStorage.getItem("bigStore.jwt");
    // }
  },
  created() {
    // this.getCartItems();
  },

  methods: {
    async getUser() {
      console.log(sessionStorage.getItem('token'));
      if(sessionStorage.getItem('token')){
          const res = await  axios.get('/api/user', {
              headers: {
                  Authorization: 'Bearer ' + sessionStorage.getItem('token'),
              },

          }).then( ({data})=>{
              console.log(data);
              this.authUser = data;
              this.first_name = data.first_name;
              this.second_name = data.last_name;
              this.phone = data.mobile;
              this.email = data.email;
              this.address = data.address;
              this.id=data.id;
              // this.getbilling_detail(data.id);
          });  
      }
    },
    login() {
      this.$router.push({
        name: "Login",
        params: { nextUrl: this.$route.fullPath },
        
      });
    },
    register() {
      this.$router.push({
        name: "Register",
        params: { nextUrl: this.$route.fullPath },
      });
    },
    placeOrder(e) {
      e.preventDefault();

      let address = this.address;
      let product_id = this.product.id;
      let quantity = this.quantity;

      axios
        .post("api/orders/", { address, quantity, product_id })
        .then((response) => this.$router.push("/confirmation"));
    },
    checkUnits(e) {
      if (this.quantity > this.product.product_stocks) {
        this.quantity = this.product.product_stocks;
      }
    },
    getcity() {
      let formData = new FormData();
      // formData.append('name', this.name);
      formData.append("state", this.state);
      formData.append("type", "get");
      city
        .addCity(formData)
        .then((response) => {
          // this.items=response.data.data;
          this.city_array = response.data.data;
        })
        .catch((error) => {
          console.log(error);
          if (error.response.status == 422) {
            this.errors_create = error.response.data.errors;
          }
        });
    },
    getstate() {
      let formData = new FormData();
      // formData.append('name', this.name);
      // formData.append("country_id", this.country_id);
      formData.append("type", "get_state");

      state
        .addState(formData)
        .then((response) => {
          this.state_array = response.data.data;
        })
        .catch((error) => {
          console.log(error);
          if (error.response.status == 422) {
            this.errors_create = error.response.data.errors;
          }
        });
    },
    handleDealerRegistration() {
       axios
        .post("/api/order_place_detail", {
          uid: this.authUser.id,
          first_name: this.first_name,
          second_name: this.second_name,
          company_name: this.company_name,
          address: this.address,
          address2: this.address2,
          city: this.city,
          state: this.state,
          zip: this.zip,
          phone: this.phone,
          email: this.email,
          payment_mode: this.payment_mode,
          product_id: this.product_id,
          quantity: this.quantity,
          amount: this.product_amount,
          total: this.total, 
        })
        .then((response) => {
          // this.isLoading = false;
          // this.showForm = false;
          // this.submitStatus = "Success";
          this.msg = response.data;
          this.address = response.data.address;
          this.uid=response.data.id;
          
          console.log(this.address);
          this.paymentSuccessful = true;
          localStorage.removeItem('cart_items');
          setTimeout(function(){ window.location.href = "/" }, 2000);
          console.log(this.msg);
          //alert(response.data.msg);
        })
        .catch((error) => {
              console.log(error);
              if (error.response.status == 422) {
                  this.errors_create = error.response.data.errors;
              }
          });
    },
//     getbilling_detail()
//     {
// axios.get("/api/billing_detail",{uid})
// .then((response) => {
// 				this.our_products = response.data;
// 				console.log(this.our_products);
// 			});
//     },
async getbilling_detail() {
      //AXIOS GETTING AUTHENTICATED USER_ID
      try {
        await axios
          .get("/api/user", {
            headers: {
              Authorization: sessionStorage.getItem("token"),
            },
          })
          .then((userresponse) => {
            axios
              .post("/api/billing_detail", {
                id: userresponse.data.id,
              })
              .then((res) => {
                // var data = JSON.parse(res.data[0].data);
                console.log(res.data[0].address);
                console.log(res.data[0].address2);

                this.address=res.data[0].address;
                this.address2=res.data[0].address2;
                this.zip=res.data[0].zip;

                
              });
          });
      } catch (error) {
        console.log(error);
      } finally {
        this.loading = false;
      }

      /  /
    },
    validateEmail() {
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
        this.msg["email"] = "Please enter a valid email address";
      } else {
        this.msg["email"] = "";
      }
    },
  },
};
</script>
<style>
.back-billing {
  margin-bottom: 40px;
}
.box {
  background-color: #f5f5f5;
  height: 50px;
  width: 200px;
  border: 1px solid #ccc;
  padding: 10px;
  margin: 10px;
  text-align: center;
  background-color: rgba(82, 153, 235);
}
.container {
  margin-left: 100px;
}
.back-billing {
  background-color: rgba(248, 249, 250);
  padding: 5%;
}
.form-label-biling {
  font-weight: bold;
  font-size: 20px;
  margin-bottom: 15px;
  color: #3c80d2;
}
.beck-billing-billing {
  background-color: rgba(248, 249, 250);
  padding: 5%;
  color: black;
}
.payment_class {
  font-weight: bold;
  font-size: 15px;
  margin-bottom: 15px;
  color: #3c80d2;
  width: 700px;
}
.cart-section .cart-table {
	overflow: hidden;
	margin-bottom: 0;
}

.cart-section .cart-table thead th {
	border-bottom-width: 1px;
	font-weight: 600;
	color: #212529;
	text-transform: uppercase;
	font-size: 15px;
	border-top: 0;
	text-align: center;
	border-bottom: 1px solid #eff2f7 !important;
	padding: 12px;
	background-color: #eff2f7;
}

.cart-section tbody tr td {
	vertical-align: middle;
	color: #212529;
	border-top: 0;
	border-bottom: 1px solid #c7c7c5 !important;
	text-align: center;
	min-width: 175px;
}

.cart-table tbody tr td a {
	color: #7e7e7e;
	white-space: nowrap;
	font-weight: 400;
	font-size: 14px;
	text-transform: capitalize;
	margin-bottom: 0;
	display: inline-block;
}

.cart-table tbody tr td a.remove-cart-porduct {
	font-size: 20px;
	font-weight: bold;
	margin-right: 10px;
}

.cart-section tbody tr td a img {
	height: 80px;
}

.cart-section tbody tr td .mobile-cart-content {
	display: none;
	justify-content: center;
	margin-top: 10px;
}

.cart-section tbody tr td h2 {
	font-size: 20px;
	color: var(--color-primary);
	font-weight: 400;
}

.cart-section tbody tr td .qty-box .input-group {
	display: block;
}

.cart-section tbody tr td .qty-box .input-group .form-control {
	width: 75px;
	margin: 0 auto;
	text-align: center;
	padding: 5px;
	height: 50px;
}

.cart-section .left-side-button {
	display: flex;
	align-items: center;
}

.cart-section .cart-checkout-section {
	margin-top: 30px;
}

.cart-section .cart-checkout-section .checkout-button {
	text-align: right;
}

.cart-section .cart-checkout-section .cart-checkout-box {
	background-color: #eff2f7;
	border-radius: 10px;
	overflow: hidden;
	padding: 0;
}

.cart-section .cart-checkout-section .cart-checkout-box .cart-box-details .total-details .top-details {
	border-bottom: 1px solid #c7c7c5;
	padding: 22px;
	margin-bottom: 0;
}

.cart-section .cart-checkout-section .cart-checkout-box .cart-box-details .total-details .top-details h6 {
	line-height: 1.9;
	color: #212529;
}

.cart-section .cart-checkout-section .cart-checkout-box .cart-box-details .total-details span {
	float: right;
}

.cart-section .cart-checkout-section .cart-checkout-box .cart-box-details .total-details .bottom-details a {
	background-color: #0163d2;
	background-color: var(--color-primary);
	width: 100%;
	display: block;
	padding: 12px 0;
	text-align: center;
	color: #fff;
	font-weight: 500;
	letter-spacing: 1.2px;
}
</style>
