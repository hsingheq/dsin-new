@extends('admin.layout.dashboard')

@section('page_name')
Edit Post 
@endsection

@section('content')

@if(Session::has('succed'))
<div class="alert alert-success"><strong>{{Session::get('succed')}}</strong></div>
@endif

@if(Session::has('fail'))
<div class="alert alert-danger"><strong>{{Session::get('fail')}}</strong></div> 
@endif
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <strong>{{$error}}</strong><br>
    @endforeach
</div>
@endif
@section('content')
<form id="add-post-form" class="edit-blog-form" action="{{ route('admin.blog.update_post') }}" method="post" enctype="multipart/form-data" autocomplete="off"  >
   @csrf
        
    <div class="row">
        <div class="col-lg-12">
            <div id="dataTableErrorContainer" class="alert alert-danger" style="display:none;">
                <ul class="text-danger" id="dataTableErrorsUl"></ul>
            </div>
        </div>    
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="product-title-input">Post Title</label>
                        <input type="text" class="form-control" id="title"  placeholder="Post title" name="title" required value="{{ $blogs->title }}">
                        <div class="invalid-feedback">Please enter a post title.</div>
                    </div>
                    <div>
                        <label>Post Description</label>

                        <textarea  id="editor" name="description" class="form-control">
                            {{ $blogs->description }}
                        </textarea>
                        <div class="invalid-feedback">Please enter a post description.</div>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="h6 mb-0">Thumbnail  Image</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden"value="{{ $blogs->thumbnail_img }}" name="thumbnail_img" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="h6 mb-0">Meta Data</h5>
                </div>
                <!-- end card header -->
                <div class="card-body">
					<div class="row">
						<div class="col-lg-12 mb-3">
							<label class="form-label" for="meta-title-input">Meta Title</label>
							<input type="text" name="meta_title" class="form-control" placeholder="Enter meta title" id="meta-title-input" value="{{ $blogs->meta_title }}">
						</div>
						<div class="col-lg-12 mb-3">
							<label class="form-label" for="meta-keywords-input">Meta Keywords</label>
							<input type="text" name="meta_keyword" class="form-control aiz-tag-input" value="{{ $blogs->meta_keyword }}" placeholder="Enter meta keywords" id="meta-keywords-input">
						</div>
						<div class="col-lg-12">
							<label class="form-label" for="meta-keywords-input">Meta Description</label>
							<textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter meta description" rows="3">{{ $blogs->meta_description }}</textarea>
						</div>
					</div>
                   
                </div>    
                <!-- end card body -->
            </div>           
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Publish</h5>
                </div>
                <div class="card-body">
                       <input type="hidden" id="blogs-date" value="123">
                    <div class="mb-3">
                        <label for="choices-publish-status-input"  class="form-label">Status</label>
                        <select class="form-select" name="status" id="choices-publish-status-input">
                            <option value="draft" <?php if($blogs->status == 'draft') { echo "selected"; } ?> >Draft</option>
                            <option value="published" <?php if($blogs->status == 'published') { echo "selected"; } ?>>Published</option>
                        </select>
                    </div>

                    <div>
                        <label for="choices-publish-visibility-input"class="form-label">Visibility</label>
                        <select class="form-select"  name="visibility"  id="choices-publish-visibility-input" data-choices data-choices-search-false>
                            <option value="Public" <?php if($blogs->visibility == 'Public') { echo "selected"; } ?>>Public</option>
                            <option value="Hidden" <?php if($blogs->visibility == 'Hidden') { echo "selected"; } ?>>Hidden</option>
                        </select>
                    </div>
                    <div class="text-end mb-3 mt-3">
                        <button type="submit" class="btn btn-success w-sm">Submit</button>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tags</h5>
                </div>
                <div class="card-body">
                    <div class="hstack gap-3 align-items-start">
                        <div class="flex-grow-1">
                            <select name="tag_ids[]" class="form-control product_id aiz-selectpicker" data-live-search="true" data-selected-text-format="count"  multiple>
                                @foreach(\App\Models\BlogTag::query()->get() as $tag)
                                @if (is_null($blogs->tag_ids) OR $blogs->tag_ids=="")

                                <option value="{{$tag->id}}" >{{ $tag->name }}</option>
                                @else
                                <option value="{{$tag->id}}"  @if(in_array($tag->id,json_decode($blogs->tag_ids,true))) selected @endif >{{ $tag->name }}</option>
                                @endif
                                   
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Blog Categories</h5>
                </div>
                <div class="card-body">
                    <div class="">

                      
                        <select name="category_ids[]" class="form-control product_id aiz-selectpicker" data-live-search="true" data-selected-text-format="count"  multiple>
                            @foreach(\App\Models\BlogCategory::query()->get() as $category)

                            @if (is_null($blogs->category_ids) OR $blogs->category_ids=="")

                            <option value="{{$category->id}}" >{{ $category->category }}</option>
                            @else
                            <option value="{{$category->id}}"  @if(in_array($category->id,json_decode($blogs->category_ids,true))) selected @endif >{{ $category->category }}</option>
                            @endif
                                


                            @endforeach
                        </select>
                      

                    </div>
                </div>
                <!-- end card body -->
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Featured Post</h5>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" name="is_featured" type="checkbox" @if($blogs->is_featured==1) checked @endif  value="1" id="featured">
                        <label class="form-check-label" for="featured"> Check this to mark as featured.</label>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
<input type="hidden" name="published_by" value="{{Session::get('loginId')['id'] }}" id="">
<input type="hidden" name="id" value="{{ $blogs->id }}">
</form>
<!--  Form Ends -->
@endsection
@section('scripts')
<script>
$(document).ready(function() {
	jQuery(".edit-blog-form").validate({
		rules: {
			title: {
				required: true,
			},
		},
		messages: {
			title: {
				required: "Please enter post title.",
			},
		},
		submitHandler: function(form) {
			return true;
		}
	});
});
</script>
@endsection
