<template>
  <div class="card d-flex justify-content-center my-account-user-box">
    <div
      class="p-4 image d-flex flex-column justify-content-center align-items-center"
    >
      <div class="user-pic">
        <Loading v-if="loading" class="position-absolute" />
        <span
          v-if="profile_picture"
          :style="{ backgroundImage: 'url(' + profile_picture + ')' }"
        >
          <img :src="profile_picture" class="d-none" />
        </span>
      </div>
      <span class="name mt-3" v-if="authUser">{{ authUser.first_name }}</span>
      <p class="full_center">{{ user_role }} <br /></p>
      <br />
      <p class="full_center" v-if="status == 'Rejected'">
        Dealer Request Status : {{ status }} Comment:{{ comment }}
      </p>
      <p class="full_center" v-if="status != 'Rejected'">
        Dealer Request Status : {{ status }}
      </p>
      <br />
      <!-- <p class="full_center" v-if="message.Unauthenticated">
        <router-link
          :to="{ name: 'Login' }"
          class="btn1 btn-dark mt-2"
        ></router-link
        ><br />
      </p> -->

      <div class="d-flex mt-2">
        <router-link :to="{ name: 'editCustomer' }" class="btn1 btn-dark mt-2"
          >Edit Profile</router-link
        >
        <router-link
          :to="{ name: 'DealerRegistration' }"
          class="btn1 btn-dark mt-2 ms-2"
          >Become Dealer</router-link
        >
      </div>
    </div>

    <div class="my-account-menus mt-2">
      <ul>
        <li>
          <router-link :to="{ name: 'MyAccount' }"
            ><i class="bi bi-person"></i> Profile</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'OrderHistory' }"
            ><i class="bi bi-file-earmark-text"></i> Orders</router-link
          >
        </li>
        <li>
          <a href=""><i class="bi bi-heart"></i> Wishlist</a>
        </li>
        <li>
          <a href=""><i class="bi bi-map"></i> Address</a>
        </li>
        <li v-if="user_role != 'Customer'">
          <a href=""><i class="bi bi-diagram-3"></i> Manage Branches</a>
        </li>
        <li v-if="user_role != 'Customer'">
          <router-link :to="{ name: 'UserVendingMachines' }"
            ><i class="bi bi-gear"></i> Vending Machines</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'UserWallet' }"
            ><i class="bi bi-wallet"></i> Manage Wallet</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'ChangePassword' }"
            ><i class="bi bi-key"></i> Change Password</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'PaymentMethods' }"
            ><i class="bi bi-credit-card"></i> Payment Methods</router-link
          >
        </li>
        <li>
          <a href="#!" @click="logout()"
            ><i class="bi bi-box-arrow-right"></i> Logout</a
          >
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import { UserStore } from "@/store/UserStore";
import Loading from "../partials/loaderComponent.vue";
import { mapState } from "pinia";
import logoutComponent from "../../mixins/logout";
let profile_picture = ref("");

export default {
  data() {
    return {
      profile_picture,
      user_role: "",
      status: "",
      comment: "",
      loading: false,
    };
  },
  created() {
    // this.user_info();
    this.user_info_detail();
  },

  computed: {
    ...mapState(UserStore, ["authUser"]),
  },

  methods: {
    handleLogout() {
      alert(1);
    },
    async user_info() {
      this.loading = true;
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
              .post("/api/user_info", {
                id: userresponse.data.id,
              })
              .then((res) => {
                // console.log(res);
                if (res?.data?.profile_picture?.user_value) {
                  this.profile_picture = res.data.profile_picture.user_value;
                }
                let role = res.data.roles;
                // console.log(role);
                const roleArray = JSON.parse(role);
                this.user_role = roleArray[0];
              });
          });
      } catch (error) {
        console.log(error);
      } finally {
        this.loading = false;
      }

      /*  */
    },
    async user_info_detail() {
      this.loading = true;
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
              .post("/api/user_info_detail", {
                id: userresponse.data.id,
              })
              .then((res) => {
                // console.log(res);
                if (res?.data?.profile_picture?.user_value) {
                  this.profile_picture = res.data.profile_picture.user_value;
                }
                let role = res.data.roles;
                let status = res.data.status;
                let recomment = res.data.comment;

                // console.log(role);
                // console.log(status);
                // console.log(recomment);
                const roleArray = JSON.parse(role);
                // const statusArray = JSON.parse(status);
                this.user_role = roleArray[0];
                if (status == "rejected") {
                  this.status = "Rejected";
                  this.comment = recomment;
                } else {
                  this.status = status;
                }

                // this.status = roleArray[0];
              });
          });
      } catch (error) {
        console.log(error);
      } finally {
        this.loading = false;
      }

      /*  */
    },
  },

  setup() {
    const form = ref({
      id: "",
    });

    const { logout } = logoutComponent();
    form.value.id = 1;
    return {
      logout,
      form,
    };
  },
  components: {
    Loading,
  },
};
</script>
