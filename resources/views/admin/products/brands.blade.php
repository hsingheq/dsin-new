@extends('admin.layout.dashboard')

@section('page_name')
Product Brands 
@endsection

@section('content')




<!-- end page title -->

<!-- start page title -->
<div class="row">
   
</div>
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
            <div class="card-header ">
				<h5 class="card-title mb-0">@yield('page_name') List</h5>
                <div class="text-end">
					<button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add brand</button>
					<button class="btn btn-danger delete-multiple"><i class="ri-delete-bin-2-line"></i> Bulk Delete</button>
				</div>
            </div>
            
            <div class="card-body">
                
                <div>
                    <div class="table-responsive mb-1">
                        <table class="table align-middle" id="brandTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input sub_chk"  type="checkbox" id="checkAll">
                                        </div>
                                    </th>
                                    <th width="150">Image</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @php $i = 1; @endphp
                                @foreach($brands as $brand)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class=" sub_chk" type="checkbox" name="id[]"   value="{{$brand->id}}" data-id="{{$brand->id}}">
                                        </div>
                                    </th>
                                    <td class="email">
                                       <div class="">  
										@if($brand->brandimage)
                                        <img src="{{ get_uploaded_image_url($brand->brandimage) }}" class=" img-fluid d-block" width="100" />
										@else
											--
										@endif
                                    </div> 
                                    </td>
                                    <td class="customer_name">{{$brand->brand}}</td>
                                    <td class="email">{{$brand->slug}}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a class="btn btn-sm btn-success" href="/admin/products/edit-product-brand/{{$brand->id}}">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn remove-brand-btn" data-id="{{$brand->id}}">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form><!--end of form for multiple delete-->
                    </div>
                    
                </div>
                        <!--start add modal-->
                
                <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>
                            <form action="{{route('admin.add_product_brand')}}" method="post" enctype="multipart/form-data" class="add-product-brand-form">
                                @csrf
                                <div class="modal-body">
                                    
                                    <div class="mb-3">
                                        <label for="brand-field" class="form-label">Brand Name</label>
                                        <input type="text" id="brand-field" name="brand" class="form-control" placeholder="Enter Brand" required />
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
											<label for="signinSrEmail">{{translate('Brand Logo')}} <small></small></label>
                                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                                </div>
                                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                                <input type="hidden" name="brandimage" value="" class="selected-files">
                                            </div>
                                            <div class="file-preview box sm">
                                            </div>
                                        </div>
                                    </div>   
                                    
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="add-btn">Add Brand</button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<!--end of add modal -->


            <!--start of edit modal -->

                <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>
                            <form action="{{route('admin.update_product_brand')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="modal-body">
                                    <!-- <img src="{{}}" value="brandimage" alt="" class="placeholderimg" id="placeholderimg">-->
                            
                                    <input type="hidden" name="id" id="id">

                                    <div class="mb-3">
                                        <label for="brand-field" class="form-label">Brand
                                            Name</label>
                                        <input type="text" id="brand" name="brand" class="form-control" value="" placeholder="Enter brand" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="slug-field" class="form-label">Slug</label>
                                        <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Slug" required />
                                    </div>
                                    <div class="mb-3">
                                        <label for="brandupload" class="form-label">Brand Image</label>
                                        <input type="file" id="product_image" name="brandimage" class="form-control " onchange="PreviewImage();" >
                                        <p id="appendimg" class="mt-3"><img src="" value="brandimage" alt="" class="placeholderimg editimageshow" id="placeholderimg"></p>
                                    </div>    
                                    
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" id="add-btn">Edit brand</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Edit Modal -->
                
                
                <!--end modal -->
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

  @section('modalAjax')
  <script>
  $(document).ready(function(){
	  jQuery(".add-product-brand-form").validate({
			rules: {
				category: {
					required: true,
				},
			},
			messages: {
				brand: {
					required: "Please enter brand name.",
				},
			},
			submitHandler: function(form) {
				return true;
			}
		});
   $(document).on('click','.editbrand', function(){
    var catid = $(this).val();
    //alert(catid);
    $('#editModal').modal('show');
    $.ajax({
        type: "GET",
        url: "/admin/products/edit-product-brand/"+catid,
        
        success: function (response){
          //  console.log(response);
          $("#brand").val(response.brand.brand);
          $("#slug").val(response.brand.slug);
          $("#id").val(response.brand.id);
          var img = $('.editimageshow');
            img.attr('src',  '../../images/uploads/brands/' + response.brand.brandimage);
            img.appendTo('#appendimg');
         // $("#placeholderimg").val(response.brand.brandimage);
        }
    });
       
   })
  });
</script>
<script>
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("brandupload").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("placeholderimg").src = oFREvent.target.result;
        };
    };

    $(document).ready(function(){
        $("#brand-field").keyup(function(){
            // $("#urls").val($(this).val().toLowerCase().replace(/\s+/g, "-"));
            $("#slug-field").val($(this).val().toLowerCase().replace(/\W/g, "-"));
        });
        $("#brand").keyup(function(){
            // $("#urls").val($(this).val().toLowerCase().replace(/\s+/g, "-"));
            $("#slug").val($(this).val().toLowerCase().replace(/\W/g, "-"));
        });
        var table = $('#brandTable').DataTable({
            'columnDefs': [ {
                'targets': [0,1, 4], /* column index */
                'orderable': false, /* true or false */
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
        $('#brandTable tbody').on('change', 'input[type="checkbox"]', function(){
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
        $('.remove-brand-btn').on('click', function(e){ 
            var id = $(this).attr('data-id');
            Swal.fire({
                title: "Are you sure?",
                text: "Are you sure you want to delete this Brand?",
                icon: "question",
                showCancelButton: true,
                showCloseButton: true,
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.href = "/admin/products/delete-brand/"+id;
                }
            });
        });
        // bUlk Delete
        $('.delete-multiple').on('click', function(e){ 
            var brands = [];
            $('#brandTable tbody input[type="checkbox"]:checked').each(function(){
                brands.push($(this).val())
            });
            if(brands.length>0) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Are you sure you want to delete selected brands?",
                    icon: "question",
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if(result.isConfirmed) {
                        //alert("Deleted");
                        window.location.href = "/admin/products/delete-bulk-brands/"+brands;
                    }
                });  
            } else {
                Swal.fire({
                    title: "No brand selected.",
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
