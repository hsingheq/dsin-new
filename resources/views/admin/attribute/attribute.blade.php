@extends('admin.layout.dashboard')

@section('page_name')
Attribute 
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
					<button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add Attribute</button>
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
                                    <th>Name</th>
                                    <th>Options</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($attributes as $attribute)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class=" sub_chk" type="checkbox" name="id[]"   value="{{$attribute->id}}" data-id="{{$attribute->id}}">
                                        </div>
                                    </th>
                                    <td>{{$attribute->name}}</td>
                                    <td>  
                                        @if ($attribute->options)
                                            @php
                                                $options = explode(",", $attribute->options);
                                            @endphp
                                            @foreach ($options as $option)
                                                <span
                                                    class="badge rounded-pill text-bg-primary">{{ $option }}</span>
                                            @endforeach
                                        @else
                                            {{ 'No option' }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="add-option">
                                                <a href="/admin/products/attribute-options/{{$attribute->id}}" class="btn btn-sm btn-secondary ">Add option</a>
                                            </div>
                                            <div class="edit">
                                                <a href="{{ url('/admin/products/attribute-edit/').'/'. $attribute->id}}" class="btn btn-sm btn-success" value="{{$attribute->id}}">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn remove-brand-btn" data-id="{{$attribute->id}}">Remove</button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Add Attribute</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>
                            <form action="/admin/products/add-attribute" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    
                                    <div class="mb-3">
                                        <label for="Attribute-field" class="form-label">Attribute Name</label>
                                        <input type="text" id="Attribute-field" name="name" class="form-control" placeholder="Enter Attribute" required />
                                    </div>

                                    
                                       
                                    
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
                'targets': [0,2], /* column index */
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
                    window.location.href = "/admin/products/delete-attribute/"+id;
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
