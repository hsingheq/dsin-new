import { defineStore } from 'pinia';
import router from '../router';

export const UserStore = defineStore({
    id: 'UserStoreId',

    state: () => ({
        token: sessionStorage.getItem('token') || 0,
        authUser:null,
       /*  name:null,
        email: sessionStorage.getItem('email') || 0, */
      /*   user: {} || 0 */

    }),
    getters: {

         getToken: state => state.token,
       /*  getName: state => state.name, */
        /* getEmail: state => state.email, */
       /*  getUser: state => state.user,  */

        user: (state) => state.authUser,
        
    },
    actions: {

        async fetchUser() {
            if(sessionStorage.getItem('token')){
                const res = await  axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                    },
    
                }).then( ({data})=>{
                    this.authUser = data;
                    
                   
                   
                      
                }); 
            }
             
   
           
          },

        login(email, password) {
            axios.post('/api/login', {
                headers: {
                    Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                },
                email: email,
                password: password,
              
            }).then(res => {
                this.authUser = res.data.user;
                  

            });
        },


        /* setUser: function () {
            this.user = {id:1,first_name:'sergios'}; */
           
          //  return new Promise((resolve, reject) => {
             /*    axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                    },
                }).then(res => {
                    this.user = res.data.user;
                    console.log(res.data.user);
                    console.log("loading......setter");
                    resolve(res)
                }); */
            //});
       /*  }, */



        setToken: function (token) {
            this.token = token
            sessionStorage.setItem('token', token);
        },


        /*  setName: function (name) {
            this.name = name
            sessionStorage.setItem('name', name);
        },  */

        /* setName: function () {
          return "helo";
            // sessionStorage.setItem('name', name);
        }, */


       /*  setEmail: function (email) {
            this.email = email
            sessionStorage.setItem('email', email);
        }, */


        removeToken: function () {
            this.token = 0;
            // this.email = 0;
            // this.name = 0;
            sessionStorage.removeItem('token');
            // sessionStorage.removeItem('name');
            // sessionStorage.removeItem('email');

        }
    }

});
