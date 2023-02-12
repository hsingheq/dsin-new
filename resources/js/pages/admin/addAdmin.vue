<template>
    <div>
      
        <div class="row">
            <div class="col-sm-5">
             
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        {{form}}
                                                <h4 class="card-title mb-0 flex-grow-1">Add User section</h4>
                                                <div class="flex-shrink-0">
                                                    <div class="dropdown card-header-dropdown">
                                                      
                                                     
                                                    </div>
                                                </div>
                                            </div>
            <div class="card-body">
                <form @submit.prevent="addAdmin">
                <div class="form-group mb-1 ">
            <span>Name</span>
            <input type="text" name="username" v-model="form.username" class="form-control">
        </div>
        <div class="form-group mb-1">
            <span>Email</span>
            <input type="text" name="email" class="form-control" v-model="form.email">
        </div>
        <div class="form-group mb-1">
            <span>Password</span>
            <input type="text" name="password" class="form-control" v-model="form.password">
        </div>

        <div class="form-group mb-1">
            <span>confirm password</span>
            <input type="text" name="cpassword" class="form-control">
        </div>

        <div class="form-group mb-1">
            <span>Roles</span>
            <select name="roles" id="" class="form-control" v-model="form.roles" placeholder="Roles">
                <option value="superadmin">superadmin</option>
                <option value="admin">admin</option>
                <option value="user">user</option>
                <option value="dealer">dealer</option>
            </select>
        </div>


        <div class="form-group">
           
            <input type="submit" value="Submit  " class="btn btn-success">
        </div>
    </form>
            </div>
        
        </div>
            </div>
        </div>
       
       

    </div>
</template>

<script>
import {reactive } from 'vue'
export default{

    setup(){
        let form = reactive({
            
            'email': '',
            'password': '',
            'username': '',
            'roles' : '',
            'status': 'active'

        });

        const addAdmin = async() =>{
            await axios.post('/api/addAdmin',form).then(res=>{
                if(res.data.success){
                    
                   swal("Person Added", "Person has been Added!", "success");
                }else{
                    console.log();
                }
               
            });
        }
        return{
            form,
            addAdmin
        }
    }
}
</script>