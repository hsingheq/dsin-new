<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add Category</div>
                </div>
                <div class="card-body">
                    {{form}}
                    <form  @submit.prevent="addCategoryApi">
                        <div class="mb-3">
                            <label for="employeeName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" v-model="form.category" name="category"  placeholder="Enter emploree name">
                        </div>
                        <div class="mb-3">
                            <label for="StartleaveDate" class="form-label">Category Slug</label>
                            <input type="text" class="form-control" v-model="form.slug" name="slug" placeholder="Category Slug" >
                        </div>
                    
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Categories</div>
                </div>
                <div class="card-body">
                    {{form}}
                    <form  @submit.prevent="addCategoryApi">
                        <div class="mb-3">
                            <label for="employeeName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" v-model="form.category" name="category"  placeholder="Enter emploree name">
                        </div>
                    
                        <div class="mb-3">
                            <label for="StartleaveDate" class="form-label">Category Slug</label>
                            <input type="text" class="form-control" v-model="form.slug" name="slug" placeholder="Category Slug" >
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</template>

<script>
import {reactive } from 'vue';
import swal from 'sweetalert';
export default{
    setup(){
        let form = reactive({
            
            'category': '',
            'slug': ''
        });
   

    const addCategoryApi = async() =>{
            await axios.post('/api/addCategoryApi',form).then(res=>{
                if(res.data.success){
                    
                   swal("Category Added", "Category has been Added!", "success");
                }else{
                    console.log();
                }
               
            });
        }

        return{
            form,
            addCategoryApi,
            
        }

}
}

</script>