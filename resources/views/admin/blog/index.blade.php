@extends('admin.layout.dashboard')

@section('page_name')
All Blog 
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
        <div id="dataTableErrorContainer">
            <ul class="text-danger" id="dataTableErrorsUl"></ul>
        </div>
    </div>
    <div class="col-lg-12">
        
        <div class="card" id="customerList">
            <div class="card-header ">

                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <div>
                            <h5 class="card-title mb-0">@yield('page_name') List</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                            <a type="button" class="btn btn-success add-btn"  id="create-btn" href="/admin/blogs/add-post"><i class="ri-add-line align-bottom me-1"></i> Add Post</a>
                            <button class="btn btn-danger delete-multiple"><i class="ri-delete-bin-2-line"></i></button>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                
                <div>
                    <div class="table-responsive mb-1">
                        <table class="table align-middle" id="blogtable">
                            <thead class="table-light text-muted">
                            <tr>
                                <tr>
									<th>No</th>
									<th>Name</th>
									<th>Slug</th>
									<th>Action</th>
								</tr>
                            </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                
                            </tbody>
                        </table>
                    </form><!--end of form for multiple delete-->
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

  @section('modalAjax')
  <script>
    let tableUrl = "/admin/blogs-list/";
    
    function editBlog(blogID) {
        window.location = "/admin/blogs/edit-post/"+blogID;
    }
	
	function deleteBlog(itemId) {
		Swal.fire({
			title: "Are you sure?",
			text: "Are you sure you want to delete this user?",
			icon: "question",
			showCancelButton: true,
			showCloseButton: true,
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "/admin/blogs/delete-post/" + itemId,
					type: "DELETE",
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					success: function(response) {
						$("#blogtable").DataTable().ajax.reload();
					},
					error: function(response) {
						alert("Error: Could not delete item.");
					}
				});
			}
		});
    }

    $(document).ready(function () {
		var table = $('#blogtable').DataTable({
			processing: true,
			serverSide: true,
			//ajax: tableUrl,
			ajax: {
                url: tableUrl,
                type: "GET",
                complete: function(jqXHR) {
                    if (jqXHR.status === 200) {
                        $("#dataTableErrorsUl").empty();
                        $("#dataTableErrorContainer").hide();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#dataTableErrorsUl").empty();
                    $("#dataTableErrorsUl").append(
                        "<li>" +
                        "An error has occured. Please try again at a later time. If the problem persists, contact us for support." +
                        "</li>"
                    );
                    $("#dataTableErrorContainer").show();
                }
            },
			columns: [
				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'name', name: 'name'},
				{data: 'slug', name: 'slug'},
				//{data: 'username', name: 'username'},
				//{data: 'phone', name: 'phone'},
				//{data: 'dob', name: 'dob'},
				{
					data: 'action', 
					name: 'action', 
					orderable: false, 
					searchable: false
				},
			],
			"oLanguage": {
                "sEmptyTable": "No blog posts found."
            }
		});
    });

  $(document).ready(function(){
   $(document).on('click','.editbrand', function(){
    var catid = $(this).val();
    //alert(catid);
    $('#editModal').modal('show');
    $.ajax({
        type: "GET",
        url: "/admin/edit-product-brand/"+catid,
        
        success: function (response){
          //  console.log(response);
          $("#brand").val(response.brand.brand);
          $("#slug").val(response.brand.slug);
          $("#id").val(response.brand.id);
          var img = $('.editimageshow');
            img.attr('src',  '../images/uploads/brands/' + response.brand.brandimage);
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
                'targets': [0,6], /* column index */
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
                text: "Are you sure you want to delete this product?",
                icon: "question",
                showCancelButton: true,
                showCloseButton: true,
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.href = "/admin/products/delete-product/"+id;
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
                        window.location.href = "/admin/delete-bulk-brands/"+brands;
                    }
                });  
            } else {
                Swal.fire({
                    title: "No product selected.",
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
