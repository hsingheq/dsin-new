<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0 flex-grow-1">Payment Methods</h5>
            </div>    
            <div class="card-body">
                <!-- Bordered Tables -->
                <table class="table nowrap dt-responsive align-middle table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Provider</th>
                            <th scope="col">Client ID/Public Key</th>
                            <th scope="col">Secket Key</th>
                            <th scope="col">Status</th>
                            <th scope="col">Mode</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in result" v-bind:key="user.id"> 
                            <td scope="row">Cash on Delivery</td>
                            <td>-</td>
                            <td>-</td>
                            <td><span class="badge bg-info">Active</span></td>
                            <td><span class="badge bg-success">Live</span></td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr v-for="user in result" v-bind:key="user.id"> 
                            <td scope="row">Paypal</td>
                            <td>-</td>
                            <td>-</td>
                            <td><span class="badge bg-warning">Inactive</span></td>
                            <td><span class="badge bg-secondary">SandBox</span></td>
                            <td>
                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i></a>
                            </td>
                        </tr>
                        <tr v-for="user in result" v-bind:key="user.id"> 
                            <td scope="row">Billzpay</td>
                            <td>-</td>
                            <td>-</td>
                            <td><span class="badge bg-warning">Inactive</span></td>
                            <td><span class="badge bg-secondary">SandBox</span></td>
                            <td>
                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i></a>
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