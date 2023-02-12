<template>
    <div>
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title mb-0 flex-grow-1">ALl Categories</h5>
                <div>
                    <a href="/dashboard/addCategory" class="btn btn-primary">Add New</a>
                </div>
            </div>    
            <div class="card-body">
                <!-- Bordered Tables -->
                <table class="table nowrap dt-responsive align-middle table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Count</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in result" v-bind:key="user.id"> 
                            <td scope="row">{{user.id}}</td>
                            <td>{{user.id}}</td>
                            <td>{{user.username}}</td>
                            <td>{{user.email}}</td>
                            <td>{{user.roles}}</td>
                            <td>{{user.status}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#"><i class="ri-eye-fill align-bottom me-2 text-muted"></i>View</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i>Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
</template>
<script>
//import Vue from 'vue';
import axios from 'axios';
// Vue.use(axios)
export default {
        name:'allUser',
    data () {
        return {
            result: {},
        }
    },
    created() {
        this.users();
    },
    mounted() {
        console.log("mounted() called.......");
    },
    methods: {
        users() {
            var page = "/api/alluserapi";
            axios.get(page)
            .then(
                ({data})=>{
                    console.log(data);
                    this.result = data;
                }
            );
        }
    }
}
</script>
<style>
</style>