<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Sub Category</div>
            </div>
            <div class="card-body">
                
{{form}}
<form  @submit.prevent="addSubCategoryApi">
    <div class="mb-3">
        <label for="employeeName" class="form-label">Category Name</label>
        <input type="text" class="form-control" v-model="form.category" name="category"  placeholder="Enter emploree name">
    </div>
     <div class="mb-3">
        <label for="employeeName" class="form-label">Sub Category Name</label>
        <input type="text" class="form-control" v-model="form.subcategory" name="subcategory"  placeholder="Enter emploree name">
    </div>
  
    <div class="mb-3">
        <label for="StartleaveDate" class="form-label">Category Slug</label>
        <input type="text" class="form-control" v-model="form.slug" name="slug" placeholder="Category Slug" >
    </div>
   
    <div class="text-end">
        <button type="submit" class="btn btn-danger">Add sub Category</button>
    </div>
</form>


            </div>
        </div>
    </div>
</template>

<script>
import {reactive } from 'vue';

export default{
    setup(){
        let form = reactive({
            
            'category': '',
            'subcategory': '',
            'slug': ''
        });
   

    const addSubCategoryApi = async() =>{
            await axios.post('/api/subCategoryApi',form).then(res=>{
                if(res.data.success){
                    
                   swal("Sub Category Added", "Sub Category has been Added!", "success");
                }else{
                    console.log();
                }
               
            });
        }

        return{
            form,
            addSubCategoryApi
            
        }

}
}

</script>