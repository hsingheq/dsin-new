<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0 flex-grow-1">Social Login Credential Settings</h5>
            </div>    
            <div class="card-body">
                <!-- Bordered Tables -->
                <table class="table nowrap dt-responsive align-middle table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Provider</th>
                            <th scope="col">App ID/Key</th>
                            <th scope="col">App Secket</th>
                            <th scope="col">Callback URI</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in result" v-bind:key="user.id"> 
                            <td scope="row">Google</td>
                            <td>-</td>
                            <td>-</td>
                            <td>/login/google/callback</td>
                            <td><span class="badge bg-info">Active</span></td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i></a>
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