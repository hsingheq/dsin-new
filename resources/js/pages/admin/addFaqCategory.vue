<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Faq Category</div>
            </div>
            <div class="card-body">
                
{{form}}
<form  @submit.prevent="addFaqCategoryApi">
    <div class="mb-3">
        <label for="employeeName" class="form-label">Category Name</label>
        <input type="text" class="form-control" v-model="form.categoryname" name="categoryname"  placeholder="Enter emploree name">
    </div>
     
  
    <div class="mb-3">
        <label for="StartleaveDate" class="form-label">Category Slug</label>
        <input type="text" class="form-control" v-model="form.categoryslug" name="categoryslug" placeholder="Category Slug" >
    </div>

    <div class="mb-3">
        <label for="StartleaveDate" class="form-label">Text</label>
        <input type="text" class="form-control" v-model="form.text" name="text" placeholder="Category Slug" >
    </div>
   

    <div class="mb-3">
        <label for="StartleaveDate" class="form-label">Meta Keywords</label>
        <input type="text" class="form-control" v-model="form.metakeywords" name="metakeywords" placeholder="Category Slug" >
    </div>
   
    <div class="mb-3">
        <label for="StartleaveDate" class="form-label">Meta Description</label>
        <input type="text" class="form-control" v-model="form.metadescription" name="metadescription" placeholder="Category Slug" >
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
            
            'categoryname': '',
            'categoryslug': '',
            'metakeywords': '',
            'metadescription': ''
        });
   

    const addFaqCategoryApi = async() =>{
            await axios.post('/api/subCategoryApi',form).then(res=>{
                if(res.data.success){
                    
                   swal("Faq Category Added", "Faq Category has been Added!", "success");
                }else{
                    console.log();
                }
               
            });
        }

        return{
            form,
            addFaqCategoryApi
            
        }

}
}

</script>