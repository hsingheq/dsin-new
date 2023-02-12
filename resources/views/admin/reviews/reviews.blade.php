@extends('admin.layout.dashboard')

@section('page_name')
    Product Review
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
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Review</th>
                                        <th>Rating </th>


                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @php $i = 1; @endphp
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class=" sub_chk" type="checkbox" name="id[]"
                                                        value="{{ $review->id }}" data-id="{{ $review->id }}">
                                                </div>
                                            </th>


                                            <td class="id"><a href="javascript:void(0);"
                                                    class="fw-medium link-primary">{{ $i++ }}</a></td>

                                            <td class="customer_name">{{ $review->user_id }}</td>
                                            <td class="customer_name">
                                                <a href="">{{ $review->product_id }}</a>
                                            </td>
                                            <td class="customer_name">{{ $review->review }}
                                            </td>
                                            <td class="email">{{ $review->rating }}</td>




                                            <td>
                                                <div class="d-flex gap-2">
                                                   
                                                    <div class="remove">
                                                        <button
                                                            class="btn btn-sm btn-danger remove-item-btn remove-brand-btn"
                                                            data-id="{{ $review->id }}">Remove</button>
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

                   
                    <!--end of add modal -->


                    <!--start of edit modal -->

                   
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
                    url: "/admin/products/edit-product-brand/" + catid,

                    success: function(response) {
                        //  console.log(response);
                        $("#brand").val(response.brand.brand);
                        $("#slug").val(response.brand.slug);
                        $("#id").val(response.brand.id);
                        var img = $('.editimageshow');
                        img.attr('src', '../../images/uploads/brands/' + response.brand
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
                    text: "Are you sure you want to delete this review?",
                    icon: "question",
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/delete-reviews/" + id;
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
                        text: "Are you sure you want to delete selected reviews?",
                        icon: "question",
                        showCancelButton: true,
                        showCloseButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            //alert("Deleted");
                            window.location.href = "/admin/delete-bulk-reviews/" + brands;
                        }
                    });
                } else {
                    Swal.fire({
                        title: "No Review selected.",
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
