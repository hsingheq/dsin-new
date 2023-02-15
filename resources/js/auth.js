import { reactive, computed } from 'vue';
import axios from 'axios';
import { UserStore } from '@/store/UserStore';
import router from "@/router";
export default{
	setup(){
        const store = UserStore()
    }
}
export const STATES = {
    INIT: "INIT",
    SUCCESS: "SUCCESS",
    PROCESSING: "PROCESSING",
    ERROR: "ERROR",
}

export const loginState = reactive({
    loginId: "aa@aa.com",
    loginPw: "123456",
    token: localStorage.getItem('token') || null,
    apiState: STATES.INIT,
    error: null
});

export const login = () => {
  loginState.apiState = STATES.PROCESSING;
  loginState.error = null;
  try {
    axios.post('/api/login', {
        email: loginState.loginId,
        password: loginState.loginPw,
        }).then(response => {
            alert(1);
            loginState.token = 'Bearer ' + response.data.access_token;
            localStorage.setItem('token', 'Bearer ' + response.data.access_token)
            sessionStorage.setItem('token', 'Bearer ' + response.data.access_token)
            //store.setToken('Bearer ' + response.data.access_token);
            //this.$route.push({name: "MyAccount"})
            router.go({ name: "/" });
            loginState.apiState = STATES.SUCCESS;
        })
    } catch(dataerror) {
        if(dataerror.response) {
            console.warn(dataerror.response.data.error)
            loginState.error = dataerror.response.data.error
        }
    } finally {
        //this.isLoading = false
    }




  /*fetch(
    "/api/login", {
      method:"POST",
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        email: loginState.loginId,
        password: loginState.loginPw
      })
    })
    .then(res => res.json())
    .then(({token, error}) => {
    if(error) throw new Error(error)
    loginState.token = token;
    localStorage.setItem('token', token)
    loginState.apiState = STATES.SUCCESS;
  })
    .catch(error => {
    console.error(error);
    loginState.error = error.message;
    loginState.apiState = STATES.ERROR;
  })*/
}

export const logoutNew = () => {
  loginState.token = null;
  login.apiState = STATES.INIT;
  localStorage.removeItem('token')
  isLoggedIn = false;
}

export const isLoggedIn = computed(() => loginState.token !== null);