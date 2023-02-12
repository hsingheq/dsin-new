<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0 flex-grow-1">Shipping Settings</h5>
            </div>    
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Minimum Order Amount</label>
                        <input type="text" class="form-control" id="validationCustom01" value="" required>
                        <div class="valid-feedback">Looks good!</div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Update Settings</button>
                    </div>
                </form>
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