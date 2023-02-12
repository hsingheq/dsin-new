@extends('admin.layout.dashboard')
<!-- Start page title -->
@section('page_name')
All Posts  
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
					<a  type="button" class="btn btn-success add-btn"  href="{{ route('admin.blog.add_post') }}"><i class="ri-add-line align-bottom me-1"></i> Add Post</a>
					<button class="btn btn-danger delete-multiple"><i class="ri-delete-bin-2-line"></i> Bulk Delete</button>
				</div>
            </div>
           
            <div class="card-body">
                <div>
                    <div class="table-responsive mb-1">
                        <table class="table align-middle" id="categoryTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th width="250">Title</th>
                                    <th>Slug</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($posts as $post)
                                
                                <tr id="row-{{$post->id}}" data-id="{{$post->id}}">
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input select-row" type="checkbox" name="chk_child" value="{{$post->id}}">
                                        </div>
                                    </th>                                    
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->slug}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                       @if ($post->status=="draft")
                                           <span class="badge badge-soft-danger text-uppercase">{{$post->status}}</span>
                                       @else
                                       <span class="badge badge-soft-success text-uppercase">{{$post->status}}</span>
                                       @endif 
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
											<div class="view">
                                                <a class="btn btn-sm btn-info" 
                                                href="{{url('blog/')."/".$post->slug}}" target="_blank">View</a>
                                            </div>
                                            <div class="edit">
                                                <a class="btn btn-sm btn-success" 
                                                href="{{url('admin/blog/edit-post/')."/".$post->id}}">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn remove-category-btn" data-id="{{$post->id}}">Remove</button>
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



    /* function UpdatePreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("editcategoryupload").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("editplaceholderimg").src = oFREvent.target.result;
        };
    }; */

   


    $(document).ready( function () {
        var table = $('#categoryTable').DataTable({
            'processing':true,
            columnDefs: [{ 
                targets: [0,5],
				orderable: false,
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
                text: "Are you sure you want to delete this post?",
                icon: "question",
                showCancelButton: true,
                showCloseButton: true,
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.href = "/admin/blog/delete-post/"+id;
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
                    text: "Are you sure you want to delete selected posts?",
                    icon: "question",
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if(result.isConfirmed) {
                        //alert("Deleted");
                        window.location.href = "/admin/blog/delete-bulk-posts/" +cats;
                    }
                });  
            } else {
                Swal.fire({
                    title: "No post selected.",
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