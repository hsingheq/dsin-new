@extends('admin.layout.dashboard')
<!-- Start page title -->
@section('page_name')
Edit Category
@endsection
@section('content')
<!-- end page title -->
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
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="customerList">
            <div class="card-header border-bottom-dashed">
				<h5 class="card-title mb-0">@yield('page_name')</h5>
                <div class="text-end">
					<a href="{{ route('admin.blog.category') }}"  class="btn btn-primary add-btn" ></i> Back to List</a>
				</div>
            </div>
           
            <div class="card-body">
                <div class="container">
                     <div class="row">
                        <div class="col-lg-6">
                          <form action="{{ route('admin.blog.update_category') }}" enctype="multipart/form-data" method="post" class="edit-category-form">
                              @csrf
                              <div class="modal-body">
                                
                                 <input type="hidden" name="id" value="{{ $category->id }}" id="id">
          
                                  <div class="mb-3">
                                      <label for="category-field" class="form-label">Category Name</label>
                                      <input type="text" id="category" name="category"  class="form-control" value="{{ $category->category }}" placeholder="Enter Category" required />
                                  </div>
                                  <div class="mb-3">
										<label for="category-field" class="form-label">Parent Category</label>
										<select name="parent_category" id="" class="form-control">
											<option value="0">None</option>
											@if(!empty($categories))
												@foreach($categories as $allcategory)
													@if ($allcategory->id==$category->parent_category)
														<option value="{{$allcategory->id}}" selected>{{$allcategory->category}}</option>
													@else
														<option value="{{$allcategory->id}}">{{$allcategory->category}}</option>
													@endif
												@endforeach
											@endif;
										</select>
                                  </div>
          
                                  <div class="form-group row">
                                      <div class="col-md-12">
										<label for="signinSrEmail">{{translate('Category Image')}}</label>
                                          <div class="input-group" data-toggle="aizuploader" data-type="image">
                                              <div class="input-group-prepend">
                                                  <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                              </div>
                                              <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                              <input type="hidden" name="category_image" value="{{$category->category_image }}" class="selected-files">
                                          </div>
                                          <div class="file-preview box sm">
                                          
                                            </div>


                                          
                                      </div>
                                  </div>
                                 
                              </div>
                              <div class="modal-footer">
                                  <div class="hstack gap-2 justify-content-end">
                                   
                                      <button type="submit" class="btn btn-danger" id="add-btn">Update Category</button>
                                  </div>
                              </div>
                          </form>
                        </div>
					</div>
                </div>
            
             
            </div>
            
                        </div>
                    </div>
                </div>
            </div>
    
    <!--end col-->
</div>
<!--end row-->

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->

 @endsection
 @section('scripts')
<script>

    $(document).ready( function () {
		jQuery(".edit-category-form").validate({
			rules: {
				category: {
					required: true,
				},
			},
			messages: {
				category: {
					required: "Please enter category name.",
				},
			},
			submitHandler: function(form) {
				return true;
			}
		});
	});
</script>
@endsection	