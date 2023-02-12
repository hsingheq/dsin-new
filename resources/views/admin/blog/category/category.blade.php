@extends('admin.layout.dashboard')
<!-- Start page title -->
@section('page_name')
Blog Categories 
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
				<h5 class="card-title mb-0">@yield('page_name') List</h5>	
                <div class="text-end">
					<button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add Category</button>
					<button class="btn btn-danger delete-multiple"><i class="ri-delete-bin-2-line"></i> Bulk Delete</button>
				</div>
            </div>
           
            <div class="card-body">
                <div>
                    <div class="table-responsive mb-1">
                        <table class="table align-middle" id="categoryTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="no-sort" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="email">Category</th>
                                    <th class="sort" data-sort="phone">Slug</th>
                                    <th class="no-sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @php $i = 1; @endphp
                                @foreach($categories as $category)
                                
                                <tr id="row-{{$category->id}}" data-id="{{$category->id}}">
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input select-row" type="checkbox" name="chk_child" value="{{$category->id}}">
                                        </div>
                                    </th>                                    
                                    <td class="customer_name">{{$category->category}}</td>
                                    <td class="email">{{$category->slug}}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a class="btn btn-sm btn-success" 
                                                href="{{url('admin/blog/edit-category/')."/".$category->id}}">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn remove-category-btn" data-id="{{$category->id}}">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--start add modal-->
                <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>
                            <form action="{{route('admin.blog.add_category')}}" enctype="multipart/form-data" method="post" class="add-category-form">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="category-field" class="form-label">Category Name</label>
                                        <input type="text" id="category-field" name="category" class="form-control" placeholder="Enter Category" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="category-field" class="form-label">Parent Category</label>
                                        <select name="parent_category" id="" class="form-control">
                                            <option value="0">No Parent</option>
                                            @if(count($categories)>0)
                                                @foreach($categories as $category)
                                                    <option value="{{$category->category}}">{{$category->category}}</option>
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
                                                <input type="hidden" name="category_image" class="selected-files">
                                            </div>
                                            <div class="file-preview box sm">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="add-btn">Add Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<!--end of add modal -->


<!--start of edit modal -->

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
		jQuery(".add-category-form").validate({
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
		
        var table = $('#categoryTable').DataTable({
            'processing':true,
            columnDefs: [{ 
                orderable: false,
                className: 'no-sort',
                targets: [],
            }],
            'select': {
                'style':    'multi',
                'selector': 'td:first-child'
            },
        });
        $("#checkAll").on( "click", function(e) {
            var rows = table.rows({ 'search': 'applied' }).nodes();
            // Check/uncheck checkboxes for all rows in the table
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });
        $('#categoryTable tbody').on('change', 'input[type="checkbox"]', function(){
            // If checkbox is not checked
            if(!this.checked){
                var el = $('#checkAll').get(0);
                // If "Select all" control is checked and has 'indeterminate' property
                if(el && el.checked && ('indeterminate' in el)){
                    // Set visual state of "Select all" control
                    // as 'indeterminate'
                    el.indeterminate = true;
                }
            }
        });
        //Single Delete on Remove button click
        $('.remove-category-btn').on('click', function(e){ 
            var id = $(this).attr('data-id');
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to delete this Category?",
                icon: "question",
                showCancelButton: true,
                showCloseButton: true,
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.href = "/admin/blog/delete-category/"+id;
                }
            });
        });
        // bUlk Delete
        $('.delete-multiple').on('click', function(e){ 
            var cats = [];
            $('#categoryTable tbody input[type="checkbox"]:checked').each(function(){
                cats.push($(this).val())
            });
            if(cats.length>0) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Are you sure you want to delete selected categories?",
                    icon: "question",
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if(result.isConfirmed) {
                        //alert("Deleted");
                        window.location.href = "/admin/blog/delete-bulk-category/"+cats;
                    }
                });  
            } else {
                Swal.fire({
                    title: "No category selected.",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    showCloseButton: true,
                });   
            } 
        });
    });
</script>
@endsection