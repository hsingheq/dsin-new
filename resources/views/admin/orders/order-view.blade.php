@extends('admin.layout.dashboard')

@section('page_name')
    All Orders
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

                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">@yield('page_name') List</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <a type="button" class="btn btn-success add-btn" id="create-btn"
                                href="/admin/products/add-product"><i class="ri-add-line align-bottom me-1"></i> Add
                                Order</a>
                            <button class="btn btn-danger delete-multiple"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
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

                                        <th>TXN ID</th>
                                        <th>transaction number</th>
                                        <th>Payment Status</th>
                                        <th>SKU</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @php $i = 1; @endphp
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class=" sub_chk" type="checkbox" name="id[]"
                                                        value="{{ $order->id }}" data-id="{{ $order->id }}">
                                                </div>
                                            </th>


                                            <td class="id"><a href="javascript:void(0);"
                                                    class="fw-medium link-primary">{{ $i++ }}</a></td>


                                            <td class="customer_name">{{ $order->txnid }}</td>
                                            <td class="email">{{ $order->transaction_number }}</td>
                                            <td class="email">
                                                @if ($order->payment_status == 'Paid')
                                                    <span class="badge badge-soft-success text-uppercase">
                                                        {{ $order->payment_status }}</span>
                                                @else
                                                    <span class="badge badge-soft-danger text-uppercase">
                                                        {{ $order->payment_status }}</span>
                                                @endif
                                            </td>
                                            <td class="email">{{ $order->user_id }}</td>



                                            <td class="status">
                                                @if ($order->order_status == 'Active')
                                                    <span
                                                        class="badge badge-soft-success text-uppercase">{{ $order->order_status }}</span>
                                                @else
                                                    <span
                                                        class="badge badge-soft-danger text-uppercase">{{ $order->order_status }}</span>
                                                @endif

                                            </td>
                                            <td>

                                                <div class="dropdown">
                                                    <a href="#" role="button" id="dropdownMenuLink1"
                                                        data-bs-toggle="dropdown" aria-expanded="true" class="show">
                                                        <i class="ri-more-2-fill"></i>
                                                    </a>

                                                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuLink1"
                                                        data-popper-placement="bottom-start" style="">
                                                        <li><a class="dropdown-item"
                                                                href="/admin/products/view-product/{{ $order->id }}"><i
                                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                View</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="/admin/products/edit-product/{{ $order->id }}"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                Edit</a></li>
                                                        <li><a href="#!"
                                                                class="dropdown-item remove-item-btn remove-brand-btn"
                                                                data-id="{{ $order->id }}"><i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Remove</a></li>
                                                    </ul>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form action="/admin/add-product-brand" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label for="brand-field" class="form-label">Brand Name</label>
                                            <input type="text" id="brand-field" name="brand" class="form-control"
                                                placeholder="Enter Brand" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="slug-field" class="form-label">Slug</label>
                                            <input type="text" id="slug-field" name="slug" class="form-control"
                                                placeholder="Enter Slug" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="brand-field" class="form-label">Brand Image</label>
                                            <input type="file" id="brandupload" name="brandimage"
                                                class="form-control" onchange="PreviewImage();" required />
                                            <img src="{{ asset('') }}images/defaults/placeholder.png"
                                                id="placeholderimg" class="placeholderimg mt-3" />
                                        </div>
                                        <div>
                                            <label for="status-field" class="form-label">Status</label>
                                            <select class="form-control" name="status" data-trigger name="status-field"
                                                id="status-field">

                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" id="add-btn">Add
                                                Brand</button>

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
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form action="/admin/update-product-brand" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <!-- <img src="{{}}" value="brandimage" alt="" class="placeholderimg" id="placeholderimg">-->

                                        <input type="hidden" name="id" id="id">

                                        <div class="mb-3">
                                            <label for="brand-field" class="form-label">Brand
                                                Name</label>
                                            <input type="text" id="brand" name="brand" class="form-control"
                                                value="" placeholder="Enter brand" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="slug-field" class="form-label">Slug</label>
                                            <input type="text" id="slug" name="slug" class="form-control"
                                                placeholder="Enter Slug" required />
                                        </div>
                                        <div class="mb-3">
                                            <label for="brandupload" class="form-label">Brand Image</label>
                                            <input type="file" id="brandupload" name="brandimage"
                                                class="form-control" onchange="PreviewImage();">
                                            <p id="appendimg" class="mt-3"><img src="" value="brandimage"
                                                    alt="" class="placeholderimg editimageshow"
                                                    id="placeholderimg"></p>
                                        </div>
                                        <div>
                                            <label for="" class="form-label">Status</label>
                                            <select class="form-control" name="status" data-trigger id="statuss">

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
                                                brand</button>

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
                //alert(catid);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/admin/edit-product-brand/" + catid,

                    success: function(response) {
                        //  console.log(response);
                        $("#brand").val(response.brand.brand);
                        $("#slug").val(response.brand.slug);
                        $("#id").val(response.brand.id);
                        var img = $('.editimageshow');
                        img.attr('src', '../images/uploads/brands/' + response.brand
                            .brandimage);
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
            oFReader.onload = function(oFREvent) {
                document.getElementById("placeholderimg").src = oFREvent.target.result;
            };
        };
    </script>
    <script>
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
                    'targets': [0, 6],
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
                    text: "Are you sure you want to delete this product?",
                    icon: "question",
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/products/delete-product/" + id;
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
                        text: "Are you sure you want to delete selected brands?",
                        icon: "question",
                        showCancelButton: true,
                        showCloseButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //alert("Deleted");
                            window.location.href = "/admin/delete-bulk-brands/" + brands;
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
