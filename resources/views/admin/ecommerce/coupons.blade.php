@extends('admin.layout.dashboard')

@section('page_name')
    Coupon
@endsection

@section('headerinject')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
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
						<a type="button" class="btn btn-success add-btn" href="{{ route('admin.create_coupon') }}"><i class="ri-add-line align-bottom me-1"></i> Add
							coupon</a>
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
                                                <input class="form-check-input sub_chk" type="checkbox" id="checkAll">
                                            </div>
                                        </th>
                                        <th>#</th>
                                      
                                        <th>Code Name</th>
                                        <th>Discount</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                         <th>Published Date</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @php $i = 1; @endphp
                                    @foreach ($coupons as $coupon)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class=" sub_chk" type="checkbox" name="id[]"
                                                        value="{{ $coupon->id }}" data-id="{{ $coupon->id }}">
                                                </div>
                                            </th>


                                            <td class="id"><a href="javascript:void(0);"
                                                    class="fw-medium link-primary">{{ $i++ }}</a></td>


                                         {{--    <td class="title">{{ $coupon->type }}</td> --}}
                                            <td class="code_name">{{ $coupon->code }}</td>
                                            <td class="code_name">{{ $coupon->discount }}</td>
                                          
                                          {{--   <td class="code_name"><span class="badge badge-soft-success text-uppercase">{{ $coupon->coupan_start_time  }}</span></td>
                                            <td class="code_name"><span class="badge badge-soft-danger text-uppercase">{{ $coupon->coupan_end_time }}</span></td> --}}
                                            <td>{{ date('d-m-Y', $coupon->start_date) }}</td>
                                            <td>{{ date('d-m-Y', $coupon->end_date) }}</td>
                           
                            <td>{{ Carbon\Carbon::parse($coupon->created_at)->diffForHumans() }}</td>

                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <a class="btn btn-sm btn-success" href="{{ url('admin/ecommerce/coupons/edit-coupon/').'/'.$coupon->id }}">Edit</a>
                                                    </div>
                                                    <div class="remove">
                                                        <button
                                                            class="btn btn-sm btn-danger remove-item-btn remove-brand-btn"
                                                            data-id="{{ $coupon->id }}">Remove</button>
                                                    </div>
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
                    <!--start add modal-->

                    <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel">Add coupon</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form action="{{ route('admin.add_coupon') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label for="coupon-field" class="form-label">Title</label>
                                            <input type="text" id="coupon-field" name="title" class="form-control"
                                                placeholder="Enter Title" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="code-field" class="form-label">Code</label>
                                            <input type="text" id="code-field" name="code_name" class="form-control"
                                                placeholder="Enter Code Name" required />
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-lg-6">
                                                <label for="no_of_times_field" class="form-label">Number Of Times</label>
                                                <input type="number" id="no_of_times_field" name="no_of_times"
                                                    class="form-control" placeholder="Enter Number Of Times" required />
                                            </div>



                                            <div class="mb-3 col-lg-6">
                                                <label for="no_of_times_field" class="form-label">Discount type

                                                </label>
                                                <select name="" id="" class="form-control">
                                                    <option value=""></option>
                                                </select>
                                                <input type="number" id="discount_field" name="discount"
                                                    class="form-control"   placeholder="Enter Discount" required />
                                            </div>



                                            <div class="mb-3 col-lg-6">
                                                <label for="start_field" class="form-label">Start Time</label>
                                                <input type="" id="start_field" name="coupan_start_time"
                                                    class="form-control" placeholder="Start Time" required />
                                            </div>


                                            <div class="mb-3 col-lg-6">
                                                <label for="end_field" class="form-label">End Time</label>
                                                <input type="" id="end_field" name="coupan_end_time"
                                                    class="form-control" placeholder="End Time" required />
                                            </div>
                                        </div>

                                        


                                        <div class="mb-3">
                                            <label for="status_field" class="form-label">Status</label>
                                            <select name="status" id="status_field" class="form-control">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>

                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-secondary" id="add-btn">Add
                                                coupon</button>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Edit coupon</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form action="{{ route('admin.update_coupon') }}" enctype="multipart/form-data"
                                    method="post">
                                    @csrf
                                    <div class="modal-body">


                                        <input type="hidden" name="id" id="id">

                                        <div class="mb-3">
                                            <label for="scoupan-field" class="form-label">Title</label>
                                            <input type="text" id="coupan_title" name="title" class="form-control"
                                                placeholder="Enter Title" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="code-field" class="form-label">Code</label>
                                            <input type="text" id="edit_code" name="code_name" class="form-control"
                                                placeholder="Enter Code Name" required />
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-lg-6">
                                                <label for="no_of_times_field" class="form-label">Number Of Times</label>
                                                <input type="text" id="edit_no_of_times_field" name="no_of_times"
                                                    class="form-control" placeholder="Enter Number Of Times" required />
                                            </div>



                                            <div class="mb-3 col-lg-6">
                                                <label for="no_of_times_field" class="form-label">Discount</label>
                                                <input type="text" id="edit_discount_field" name="discount"
                                                    class="form-control" placeholder="Enter Discount" required />
                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="start_field" class="form-label">Start Time</label>
                                                <input type="text" id="edit_start_field" name="coupan_start_time"
                                                    class="form-control" placeholder="Start Time" required />
                                            </div>


                                            <div class="mb-3 col-lg-6">
                                                <label for="end_field" class="form-label">End TIme</label>
                                                <input type="text" id="edit_end_field" name="coupan_end_time"
                                                    class="form-control" placeholder="End Time" required />
                                            </div>

                                        </div>


                                        <div class="mb-3">
                                            <label for="status_field" class="form-label">Status</label>
                                            <select name="status" id="status_field" class="form-control">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" id="add-btn">Edit
                                                coupon</button>

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
        $(document).ready(function() {
            $(document).on('click', '.editbrand', function() {
                var catid = $(this).val();

                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/admin/ecommerce/edit-coupon/" + catid,

                    success: function(response) {

                        $("#coupan_title").val(response.coupon.title);
                        $("#edit_code").val(response.coupon.code_name);
                        $("#edit_no_of_times_field").val(response.coupon.no_of_times);
                        $("#edit_discount_field").val(response.coupon.discount);
                        $("#edit_start_field").val(response.coupon.coupan_start_time);
                        $("#edit_end_field").val(response.coupon.coupan_end_time);
                        $("#id").val(response.coupon.id);

                    }
                });

            })
        });
    </script>
    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("brandupload").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("placeholderimg").src = oFREvent.target.result;
            };
        };

        $(document).ready(function() {
            $("#brand-field").keyup(function() {
                // $("#urls").val($(this).val().toLowerCase().replace(/\s+/g, "-"));
                $("#slug-field").val($(this).val().toLowerCase().replace(/\W/g, "-"));
            });
            $("#brand").keyup(function() {
                // $("#urls").val($(this).val().toLowerCase().replace(/\s+/g, "-"));
                $("#slug").val($(this).val().toLowerCase().replace(/\W/g, "-"));
            });
            var table = $('#brandTable').DataTable({
                'columnDefs': [{
                    'targets': [0, 5],
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
            $('#brandTable tbody').on('change', 'input[type="checkbox"]', function() {
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
                    text: "Are you sure you want to delete this coupon?",
                    icon: "question",
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/ecommerce/delete-coupon/" + id;
                    }
                });
            });
            // bUlk Delete
            $('.delete-multiple').on('click', function(e) {
                var brands = [];
                $('#brandTable tbody input[type="checkbox"]:checked').each(function() {
                    brands.push($(this).val())
                });
                if (brands.length > 0) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Are you sure you want to delete selected coupons?",
                        icon: "question",
                        showCancelButton: true,
                        showCloseButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "/admin/ecommerce/delete-multiple-coupon/" +
                                brands;
                        }
                    });
                } else {
                    Swal.fire({
                        title: "No coupon selected.",
                        text: "",
                        icon: "warning",
                        showCancelButton: true,
                        showCloseButton: true,
                    });
                }
            });
        });
    </script>

<script>
    $( function() {
      $( "#start_field" ).datepicker();
      $( "#end_field" ).datepicker();
      $( "#edit_start_field" ).datepicker();
      $( "#edit_end_field" ).datepicker();
    } );
    </script>
@endsection
