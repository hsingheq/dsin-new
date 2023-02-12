@extends('admin.layout.dashboard')
<!-- Start page title -->
@section('page_name')
All Pages  
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
					<a  type="button" class="btn btn-success add-btn"  href="{{ route('admin.cms.add_page') }}"><i class="ri-add-line align-bottom me-1"></i> Add Page</a>
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

                                    <th class="sort" data-sort="customer_name">#</th>
                                    <th class="sort" data-sort="email">Title</th>
                                    <th class="sort" data-sort="phone">Slug</th>
                                    <th class="sort" data-sort="phone">Date</th>
                                    <th class="sort" data-sort="phone">Status</th>
                                    <th class="no-sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @php $i = 1; @endphp
                                @foreach($pages as $page)
                                
                                <tr id="row-{{$page->id}}" data-id="{{$page->id}}">
                                    <th scope="row">
                                      
                                      
                                      
                                        <div class="form-check">
                                            <input class="form-check-input select-row" type="checkbox" name="chk_child" value="{{$page->id}}">
                                        </div>
                                       
                                        
                                    </th>                                    
                                    <td class="id" ><a href="javascript:void(0);" class="fw-medium link-primary">{{$i++}}</a></td>
                                    <td class="customer_name">{{$page->title}}</td>
                                    <td class="email">{{$page->slug}}</td>
                                    <td class="email">{{time_ago($page->created_at)}}</td>
                                    <td class="email">
                                        @if ($page->status=="draft")
                                            <span class="badge badge-soft-danger text-uppercase">{{$page->status}}</span>
                                        @else
                                        <span class="badge badge-soft-success text-uppercase">{{$page->status}}</span>
                                        @endif 
                                        
                                     </td>
                                    {{-- <td class="status">
                                        @if($category->status=="Active")
                                        <span class="badge badge-soft-success text-uppercase">Active</span>
                                        @else
                                        <span class="badge badge-soft-danger text-uppercase">Inactive</span>
                                        @endif
                                    </td> --}}
                                    <td>
                                       
                                       
                                       
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a class="btn btn-sm btn-success" 
                                                href="{{url('admin/cms/edit-page/')."/".$page->id}}">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn remove-category-btn" data-id="{{$page->id}}">Remove</button>
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
                text: "Are you sure you want to delete this page?",
                icon: "question",
                showCancelButton: true,
                showCloseButton: true,
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.href = "/admin/cms/delete-page/"+id;
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
                    text: "Are you sure you want to delete selected pages?",
                    icon: "question",
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if(result.isConfirmed) {
                        //alert("Deleted");
                        window.location.href = "/admin/cms/delete-bulk-pages/" +cats;
                    }
                });  
            } else {
                Swal.fire({
                    title: "No page selected.",
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