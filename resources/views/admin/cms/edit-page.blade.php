@extends('admin.layout.dashboard')

@section('page_name')
Edit Page 
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
<form id="add-post-form" novalidate class="needs-validation" action="{{ route('admin.cms.update_page') }}" method="post" enctype="multipart/form-data" autocomplete="off"  >
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
                        <label class="form-label" for="product-title-input">Page Title</label>
                        <input type="text" class="form-control" id="title"  placeholder="Page title" name="title" required value="{{ $blogs->title }}">
                        <div class="invalid-feedback">Please enter a post title.</div>
                    </div>
                    <div>
                        <label>Page Description</label>

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
                    <h5 class="card-title mb-0">Thumbnail  Image</h5>
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
                            <small class="text-muted">{{translate('This image is visible in all product box. Use best sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')}}</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Meta Description</h5>
                </div>
                <!-- end card header -->
                <div class="card-body">
                    <textarea class="form-control"  name="meta_description" id="excerpt" placeholder="Must enter minimum of a 100 characters"  rows="3">{{ $blogs->meta_description }}</textarea>

                
                   
                </div>    
                <!-- end card body -->
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Meta Keywords</h5>
                </div>
                <!-- end card header -->
                <div class="card-body">
                

                    <textarea class="form-control  aiz-tag-input" name="meta_keyword" id="excerpt" placeholder="Must enter minimum of a 100 characters"  rows="3">{{ $blogs->meta_keyword }}</textarea>
                 
                </div>    
                <!-- end card body -->
            </div>
            <!-- end card -->
           
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
                            <option value="draft" selected>Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>

                    <div>
                        <label for="choices-publish-visibility-input"class="form-label">Visibility</label>
                        <select class="form-select"  name="visibility"  id="choices-publish-visibility-input" data-choices data-choices-search-false>
                            <option value="Public" >Public</option>
                            <option value="Hidden">Hidden</option>
                        </select>
                    </div>
                    <div class="text-end mb-3 mt-3">
                        <button type="submit" class="btn btn-success w-sm">Submit</button>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

           {{--  <div class="card">
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
            </div> --}}
            <!-- end card -->

          {{--   <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Product Categories</h5>
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
            </div> --}}

           {{--  <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Featured Page</h5>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" name="is_featured" type="checkbox" @if($blogs->is_featured==1) checked @endif  value="1" id="featured">
                        <label class="form-check-label" for="featured"> Check this to mark as featured.</label>
                    </div>
                </div>
                <!-- end card body -->
            </div> --}}
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
<script src="{{asset('libs/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/pages/form-validation.init.js')}}"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {


        })
        .catch(error => {
            console.error(error);
        });
</script>
<style>
    .form-control.is-valid:focus, .was-validated :valid.form-control {
        border-color: #DDDDDD !important;
        background-image: inherit !important;
        box-shadow: inherit !important;
    }
</style>
@endsection
