<template>
    <div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Static page</div>

            </div>
            <div class="card-body">
                <div class="form-group mb-2">
            <span>Title</span>
            <input type="text" name="title" placeholder="Add Title" class="form-control">
        </div>

        <div class="form-group mb-2">
            <span>Slug(URL)</span>
            <input type="text" name="slug" class="form-control" placeholder="Add Slug">
        </div>

        <div class="form-group mb-2">
            <span>Description</span>
            <textarea name="description" id="" placeholder="Add Description" cols="30" rows="10" class="form-control snow-editor"></textarea>
           
        </div>
        <div class="form-group ">
            <input type="submit" value="Add Page" class="btn btn-success">
        </div>

            </div>
        </div>
        
    </div>
</template>