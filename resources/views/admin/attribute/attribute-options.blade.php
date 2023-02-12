@extends('admin.layout.dashboard')

@section('page_name')
Attribute options 
({{ $attribute->name }})
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
						<button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add Option</button>
						<button class="btn btn-danger delete-multiple"><i class="ri-delete-bin-2-line"></i> Bulk Delete</button>
						<a href="{{ route('admin.attribute') }}" class="btn btn-secondary">Back</a>
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
                                    <th>#</th>
                                    <th>name</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @php $i = 1; @endphp
                                @foreach($attributes_list as $attributeitem)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class=" sub_chk" type="checkbox" name="id[]"   value="{{$attributeitem->id}}" data-id="{{$attribute->id}}">
                                        </div>
                                        
                                    </th>

                                    
                                    <td class="id" ><a href="javascript:void(0);" class="fw-medium link-primary">{{$i++}}</a></td>
                                   

                                    <td class="customer_name">{{$attributeitem->value}}</td>
                                   
                                   
                                    
                                    
                                   
                                    <td>
                                        <div class="d-flex gap-2">
                                            
                                            <div class="edit">
                                                <a class="btn btn-sm btn-success"
                                                 href="{{ url('/admin/products/attribute-options-edit/')."/".$attributeitem->id }}">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn remove-brand-btn" data-id="{{$attributeitem->id}}">Remove</button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Attribute options</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>
                            <form action="{{url('/admin/products/add-attribute-options/')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="attribute_id" value="{{ $attribute->id }}">
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="Attribute-field" class="form-label">Attribute</label>
                                       <p class="form-control bg-disable disabled">{{ $attribute->name }}</p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="Attribute-field" class="form-label"> Name</label>
                                        <input type="text"  id="Attribute-field" name="value" class="form-control" placeholder="Enter Attribute" required />
                                    </div>
                                    

                                   

                                   {{--  <div class="mb-3">
                                        <label for="Attribute-field" class="form-label">price</label>
                                        <input type="text" id="Attribute-field" name="price" class="form-control" placeholder="price" required />
                                    </div> --}}

                                    
                                       
                                    
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                                       
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
                            <form action="/admin/update-product-brand" enctype="multipart/form-data" method="post">
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
                                        <input type="file" id="brandupload" name="brandimage" class="form-control" onchange="PreviewImage();" >
                                        <p id="appendimg" class="mt-3"><img src="" value="brandimage" alt="" class="placeholderimg editimageshow" id="placeholderimg"></p>
                                    </div>    
                                    <div>
                                        <label for="" class="form-label">Status</label>
                                        <select class="form-control" name="status" data-trigger  id="statuss">
                                            
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
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
                'targets': [0,3], /* column index */
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
                text: "Are you sure you want to delete this Attribute?",
                icon: "question",
                showCancelButton: true,
                showCloseButton: true,
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.href = "/admin/products/delete-attribute-option/"+id;
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
