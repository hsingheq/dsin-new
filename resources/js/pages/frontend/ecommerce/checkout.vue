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
          <form class="row g-3">
            <div class="row g-3">
              <div class="col">
                <label for="inputAddress" class="form-label">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="First name"
                  aria-label="First name"
                />
              </div>
              <div class="col">
                <label for="inputAddress" class="form-label">Second Name</label>
                <input
                  type="text"
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
                class="form-control"
                id="inputcompany"
                placeholder="Enter Company Name"
              />
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Address</label>
              <input
                type="text"
                class="form-control"
                id="inputAddress"
                placeholder="House No and Street Number"
              />
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Address 2</label>
              <input
                type="text"
                class="form-control"
                id="inputAddress2"
                placeholder="Apartment, studio, or floor"
              />
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Town/City</label>
              <input type="text" class="form-control" id="inputCity" />
            </div>
            <div class="col-md-4">
              <label for="inputState" class="form-label">State</label>
              <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputZip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="inputZip" />
            </div>
            <div class="col-12">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="gridCheck"
                />
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div>
            <div class="row g-3">
              <div class="col">
                <label for="inputAddress" class="form-label">Phone</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter Phone no "
                  aria-label="First name"
                />
              </div>
              <div class="col">
                <label for="inputAddress" class="form-label">Email</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter Email"
                  aria-label="Last name"
                />
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="beck-billing-billing">
          <label for="inputAddress" class="form-label-biling"
            >Payment Mode</label
          ><br />

          <label for="inputAddress" class="form-label">Cash on Delivery</label>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["pid"],
  data() {
    return {
      address: "",
      quantity: 1,
      isLoggedIn: null,
      product: [],
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
</style>
