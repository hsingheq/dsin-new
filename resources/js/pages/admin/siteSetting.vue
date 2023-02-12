<template>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Site Settings</div>
            </div>
            <div class="card-body">
                
{{form}}
<form  @submit.prevent="siteSettingApi">
    <div class="mb-3">
        <label for="employeeName" class="form-label">Site Title</label>
        <input type="text" class="form-control" v-model="form.title" name="title"  placeholder="Enter Site Title">
    </div>
  
    <div class="mb-3">
        <label for="StartleaveDate" class="form-label">Site Description</label>
       <textarea name="description" id="" placeholder="Enter SEO Description" cols="30" rows="3" v-model="form.description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="StartleaveDate" class="form-label">custom css</label>
       <textarea name="customcss" placeholder="Custom CSS" v-model="form.customcss" id="" cols="30" rows="3" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="StartleaveDate" class="form-label">custom js</label>
       <textarea name="customjs" id="" placeholder="Custom Js" v-model="form.customjs" cols="30" rows="3" class="form-control"></textarea>
    </div>
   
    <div class="text-end">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>


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
            
            'title': '',
            'description': '',
            'customcss': '',
            'customjs': '',
        });
   

    const siteSettingApi = async() =>{
            await axios.post('/api/siteSettingApi',form).then(res=>{
                if(res.data.success){
                    
                   swal("site settings ", "Settings has done!", "success");
                }else{
                    console.log();
                }
               
            });
        }

        return{
            form,
            siteSettingApi,
            
        }

}
}

</script>