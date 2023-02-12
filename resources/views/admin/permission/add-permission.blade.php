@extends('admin.layout.dashboard')

@section('page_name')
   Create  Role & Permission 
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
					<h5 class="card-title mb-0">@yield('page_name') </h5>
                    <div class="text-end">
						<a href="{{ route('admin.all_permission') }}" class="btn btn-primary add-btn" id="create-btn"> Back to List</a>

					</div>
                </div>

                <div class="card-body p-5">


                    <form action="{{ route('admin.store_permission') }}" method="post">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-10 mb-3">
                                    <div class="form-group ">
                                        <label for="">Role Name <em>*</em></label>
                                        <input type="text" placeholder="Enter Role Name" name="name" id=""
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 ">

                                    <label for="">Permissions</label>
                                </div>
                                <div class="col-sm-3 form-check-success my-3">
                                    <div class="checkbox-label"></div>
                                   
                                    <input type="checkbox" class="form-check-input" name="sections[]" value="products" id=""> Products
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" value="ecommerce" id=""> Ecommerce
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" value="wallets" id=""> Wallets
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" value="blog" id=""> Blog
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" value="cms" id=""> CMS
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" value="customers" id=""> Customers
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" value="dealers" id=""> Dealers
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" value="sales_person" id=""> Sales
                                    Person
                                </div>


                            </div>



                            <div class="row">
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" value="users" id=""> Users
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" value="settings" id=""> Settings
                                </div>



                            </div>
                            <div class="row">
                                <div class="form-group mt-5">
                                    <input type="submit" value="Save" class="btn btn-secondary">
                                </div>
                            </div>
                        </div>
                    </form>





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
                    text: "Are you sure you want to delete this Brand?",
                    icon: "question",
                    showCancelButton: true,
                    showCloseButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/delete-brand/" + id;
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
