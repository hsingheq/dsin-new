@extends('admin.layout.dashboard')

@section('page_name')
    Role & Permission
@endsection

@section('content')
    <!-- end page title -->

    <!-- start page title -->
    <div class="row">

    </div>
    <!-- end page title -->
    @if (Session::has('succed'))
        <div class="alert alert-success"><strong>{{ Session::get('succed') }}</strong></div>
    @endif

    @if (Session::has('fail'))
        <div class="alert alert-danger"><strong>{{ Session::get('fail') }}</strong></div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <strong>{{ $error }}</strong><br>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">

            <div class="card" id="customerList">
                <div class="card-header ">
					<h5 class="card-title mb-0">@yield('page_name') List</h5>
                    <div class="text-end">
						<a href="{{ route('admin.add_permission') }}" class="btn btn-success add-btn" id="create-btn">Add Role & Permission</a>
						<button class="btn btn-danger delete-multiple"><i class="ri-delete-bin-2-line"></i> Bulk Delete</button>
					</div>
                </div>

                <div class="card-body">

                    <div>
                        <div class="table-responsive mb-1">
                            <table class="table align-middle" id="roleTable">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input sub_chk" type="checkbox" id="checkAll">
                                            </div>
                                        </th>
                                        <th>#</th>
                                        <th>Role Name</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">

                                    @php $i = 1;
                                        
                                    @endphp
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class=" sub_chk" type="checkbox" name="id[]" value="{{ $permission->id }}" data-id="{{ $permission->id }}">
                                                </div>
                                            </th>
                                            <td class="id"><a href="javascript:void(0);" class="fw-medium link-primary">{{ $i++ }}</a></td>

                                            <td>{{ $permission->name }}</td>
                                            <td class="customer_name">
                                                @php
                                                    $jpermissions = json_decode($permission->sections, true);
                                                @endphp

                                                @if (!is_null($jpermissions))
                                                    @foreach ($jpermissions as $jpermssion)
                                                        <span
                                                            class="badge rounded-pill text-bg-secondary">{{ $jpermssion }}</span>
                                                    @endforeach
                                                @else
                                                    {{ 'No permission found!' }}
                                                @endif

                                            </td>




                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <a class="btn btn-sm btn-success edit-item-btn editbrand"
                                                            href="/admin/settings/edit-permission/{{ $permission->id }}">Edit</a>
                                                    </div>

                                                    <button class="btn btn-sm btn-danger remove-item-btn remove-brand-btn"
                                                        data-id="{{ $permission->id }}">Remove</button>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </form>
                            <!--end of form for multiple delete-->
                        </div>

                    </div>






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
     

        $(document).ready(function() {
           
            var table = $('#roleTable').DataTable({
                'columnDefs': [{
                    'targets': [0, 4],
                    /* column index */
                    'orderable': false,
                    /* true or false */
                }],
                'select': {
                    'style': 'multi',
                    'selector': 'td:first-child'
                },
            });
            $("#checkAll").on("click", function(e) {
                var rows = table.rows({
                    'search': 'applied'
                }).nodes();
                // Check/uncheck checkboxes for all rows in the table
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
            });
            $('#roleTable tbody').on('change', 'input[type="checkbox"]', function() {
                // If checkbox is not checked
                if (!this.checked) {
                    var el = $('#checkAll').get(0);
                    // If "Select all" control is checked and has 'indeterminate' property
                    if (el && el.checked && ('indeterminate' in el)) {
                        // Set visual state of "Select all" control
                        // as 'indeterminate'
                        el.indeterminate = true;
                    }
                }
            });
            //Single Delete on Remove button click
            $('.remove-brand-btn').on('click', function(e) {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "Are you sure you want to delete this Permission?",
                    icon: "question",
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/settings/delete-permission/" + id;
                    }
                });
            });
            // bUlk Delete
            $('.delete-multiple').on('click', function(e) {
                var brands = [];
                $('#roleTable tbody input[type="checkbox"]:checked').each(function() {
                    brands.push($(this).val())
                });
                if (brands.length > 0) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Are you sure you want to delete selected Permissions?",
                        icon: "question",
                        showCancelButton: true,
                        showCloseButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //alert("Deleted");
                            window.location.href = "/admin/settings/delete-multiple-permission/" + brands;
                        }
                    });
                } else {
                    Swal.fire({
                        title: "No Permission selected.",
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
