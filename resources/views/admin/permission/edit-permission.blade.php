@extends('admin.layout.dashboard')

@section('page_name')
    Edit Role & Permissions
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
						<a href="{{ route('admin.add_permission') }}" class="btn btn-success add-btn" id="create-btn"><i class="ri-add-line align-bottom me-1"></i> Add Permission</a>
							<a href="/admin/settings/all-permission/" class="btn btn-primary add-btn" id="create-btn"> Back to List</a>
					</div>
                </div>

                <div class="card-body p-5">


                    <form action="{{ route('admin.update_permission') }}" method="post">
                        @csrf

                        @php
                            if (!is_null($permission->sections)) {
                                $sections = json_decode($permission->sections, true);
                            } else {
                                $sections = [];
                            }
                        @endphp

                        <input type="hidden" name="id" value="{{ $permission->id }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-10 mb-3">
                                    <div class="form-group ">
                                        <label for="">Role Name <em>*</em></label>
                                        <input type="text" placeholder="Enter Role Name" name="name" id="" readonly class="form-control" value="{{ $permission->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 ">

                            <label for="">Permissins</label>
                                </div>
                                <div class="col-sm-3  form-check-success my-3">
                                   
                                    <input type="checkbox" class="form-check-input" name="sections[]"
                                        {{ in_array('products', $sections) ? 'checked' : '' }} value="products"
                                        id=""> Products
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]"
                                        {{ in_array('ecommerce', $sections) ? 'checked' : '' }} value="ecommerce"
                                        id=""> Ecommerce
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]"
                                        {{ in_array('wallets', $sections) ? 'checked' : '' }} value="wallets" id="">
                                    Wallets
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" {{ in_array('blog', $sections) ? 'checked' : '' }}
                                        value="blog" id=""> Blog
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]" {{ in_array('cms', $sections) ? 'checked' : '' }}
                                        value="cms" id=""> CMS
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]"
                                        {{ in_array('customers', $sections) ? 'checked' : '' }} value="customers"
                                        id=""> Customers
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]"
                                        {{ in_array('dealers', $sections) ? 'checked' : '' }} value="dealers" id="">
                                    Dealers
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]"
                                        {{ in_array('sales_person', $sections) ? 'checked' : '' }} value="sales_person"
                                        id=""> Sales Person
                                </div>


                            </div>



                            <div class="row">
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]"
                                        {{ in_array('users', $sections) ? 'checked' : '' }} value="users" id="">
                                    Users
                                </div>
                                <div class="col-sm-3 form-check-success  my-3">
                                    <input type="checkbox" class="form-check-input"  name="sections[]"
                                        {{ in_array('settings', $sections) ? 'checked' : '' }} value="settings"
                                        id=""> Settings
                                </div>



                            </div>
                            <div class="row">
                                <div class="form-group mt-5">
                                    <input type="submit" value="Update" class="btn btn-secondary">
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
