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
          <form @submit.prevent="handleDealerRegistration" class="row g-3">
            <div class="row g-3">
              <div class="col">
                <label for="inputAddress" class="form-label">First Name</label>
                <input
                  type="text"
                  v-model="first_name"
                  class="form-control"
                  placeholder="First name"
                  aria-label="First name"
                />
              </div>
              <div class="col">
                <label for="inputAddress" class="form-label">Second Name</label>
                <input
                  type="text"
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
                class="form-control"
                id="inputcompany"
                placeholder="Enter Company Name"
              />
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Address</label>
              <input
                type="text"
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
            <div class="col-md-4">
              <label for="inputZip" class="form-label">Zip</label>
              <input
                type="text"
                v-model="zip"
                class="form-control"
                id="inputZip"
              />
            </div>
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
              <div class="col">
                <label for="inputAddress" class="form-label">Phone</label>
                <input
                  type="text"
                  v-model="phone"
                  maxlength="10"
                  class="form-control"
                  placeholder="Enter Phone no "
                  aria-label="First name"
                />
              </div>
              <div class="col">
                <label for="inputAddress" class="form-label">Email</label>
                <input
                  type="text"
                  v-model="email"
                  @blur="validateEmail"
                  class="form-control"
                  placeholder="Enter Email"
                  aria-label="Last name"
                />
              </div>
            </div>

            <div class="col-sm-6">
              <div class="beck-billing-billing">
                <input type="radio" value="cod" v-model="payment_mode" />
                <label for="one">Cash On Delivery</label>

                <input type="radio" value="prepaid" v-model="payment_mode" />
                <label for="two">Prepaid</label>
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
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Pay</button>
              <p v-if="paymentSuccessful">Payment successful! Thank you for your purchase.</p>
            </div>
          </form>
        </div>
      </div>
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
      address: "",
      quantity: 1,
      isLoggedIn: null,
      product: [],
      city: 0,
      city_array: [],
      state: 0,
      state_array: [],
      paymentSuccessful: false,
      paymentMethod: "cashOnDelivery",
    };
  },
  mounted() {
    this.isLoggedIn = sessionStorage.getItem("token") != null;
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
      console.log(this.product);
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

  methods: {
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
      // this.isLoading = true;
      // this.v$.$touch();
      // if (this.v$.$invalid) {
      //   this.submitStatus = "Error";
      //   this.message = "Please check above errors.";
      //   this.isLoading = false;
      // } else {
      // do your submit logic here

      // ---------------
      // -------------------
      axios
        .post("/api/order_place_detail", {
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
        })
        .then((response) => {
          // this.isLoading = false;
          // this.showForm = false;
          // this.submitStatus = "Success";
          this.msg = response.data;
          this.paymentSuccessful = true
          console.log(msg);
          alert(response.data.msg);
        });

      //  }
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
</style>
