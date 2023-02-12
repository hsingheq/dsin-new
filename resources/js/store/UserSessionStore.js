import {defineStore} from 'pinia';

export const UserSessionStore = defineStore({
    id: 'UserStoreId',

    state: () => ({
        sessionkey: localStorage.getItem("session") ||0,
      
    }),
    getters:{
        getSessionkey: state => state.sessionkey,
       
    },
    actions:{

        setSessionkey: function (sessionkey){
            this.sessionkey = sessionkey
            localStorage.setItem("session",sessionkey)
        },
      

        removeEmail: function(){
            this.sessionkey = 0
            localStorage.removeItem("session",JSON.stringify(obj));
           
        }
    }
});
