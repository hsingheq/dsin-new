@extends('admin.layout.dashboard')

@section('page_name')
Edit Brand
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
<div class="row">
    <div class="col-lg-12">
        
        <div class="card" id="customerList">
            <div class="card-header ">
				<h5 class="card-title mb-0">@yield('page_name') List</h5>
                <div class="text-end">
					<a href="{{ route('admin.brands') }}"  class="btn btn-success add-btn" >All Brands</a>
				</div>
            </div>
            
            <div class="card-body">

               <div class="container">
                <div class="row">
                    <div class="col-lg-6">  
						<form action="{{route('admin.update_product_brand')}}" enctype="multipart/form-data" method="post" class="edit-product-brand-form">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{ $brand->id }}" id="id">
                            <div class="mb-3">
                                <label for="brand-field" class="form-label">Brand Name</label>
                                <input type="text" id="brand" name="brand" class="form-control" value="{{ $brand->brand }}" placeholder="Enter brand" required />
                            </div>
                            <div class="mb-3">
                                <label for="slug-field" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug" class="form-control" value="{{ $brand->slug }}" placeholder="Enter Slug" required />
                            </div>
                            <div class="form-group row">                                        
								<div class="col-md-12">
									<label for="signinSrEmail">{{translate('Brand Logo')}} <small></small></label>
									<div class="input-group" data-toggle="aizuploader" data-type="image">
										<div class="input-group-prepend">
											<div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
										</div>
										<div class="form-control file-amount">{{ translate('Choose File') }}</div>
										<input type="hidden" name="brandimage" value="{{ uploaded_id($brand->brandimage) }}" class="selected-files">
									</div>
									<div class="file-preview box sm"></div>
								</div>
							</div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="submit" class="btn btn-danger" id="add-btn">Update brand</button>
                            </div>
                        </div>
                    </form></div>
                    <div class="col-lg-3">&nbsp;</div>
                </div>
               </div>
                          
                        </div>
                    </div>
                </div>
                <!--End Edit Modal -->
                
                
                <!--end modal -->
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
	jQuery(".edit-product-brand-form").validate({
		rules: {
			brand: {
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
        /*$("#brand-field").keyup(function(){
            // $("#urls").val($(this).val().toLowerCase().replace(/\s+/g, "-"));
            $("#slug-field").val($(this).val().toLowerCase().replace(/\W/g, "-"));
        });
        $("#brand").keyup(function(){
            // $("#urls").val($(this).val().toLowerCase().replace(/\s+/g, "-"));
            $("#slug").val($(this).val().toLowerCase().replace(/\W/g, "-"));
        });*/
        var table = $('#brandTable').DataTable({
            'columnDefs': [ {
                'targets': [0,5], /* column index */
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
