<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size=""
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title> @yield('page_name') | {{ get_setting('title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="{{ getBaseURL() }}">
	<meta name="file-base-url" content="{{ getFileBaseURL() }}">
    <!-- App favicon -->
   
    @if (is_null(get_setting('favicon')) OR get_setting('favicon')=='')   
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    @else  
    <link rel="icon" type="image/png" sizes="32x32" href="{{ get_uploaded_image_url(get_setting('favicon')) }}">
    @endif

    <link rel="stylesheet" href="{{ asset('css/vendors.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/aiz-core.css') }}"> 
    
   
    <!--datatable css-->
     <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables/datatables.min.css') }}" /> 

    <!-- jsvectormap css -->
    <link href="{{ asset('libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js') }}"></script>
    <!-- Sweet Alert css-->
    <link href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    
    @yield('headerinject')
   
    <script>
    	var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: '{{ translate('Nothing selected') }}',
            nothing_found: '{{ translate('Nothing found') }}',
            choose_file: '{{ translate('Choose file') }}',
            file_selected: '{{ translate('File selected') }}',
            files_selected: '{{ translate('Files selected') }}',
            add_more_files: '{{ translate('Add more files') }}',
            adding_more_files: '{{ translate('Adding more files') }}',
            drop_files_here_paste_or: '{{ translate('Drop files here, paste or') }}',
            browse: '{{ translate('Browse') }}',
            upload_complete: '{{ translate('Upload complete') }}',
            upload_paused: '{{ translate('Upload paused') }}',
            resume_upload: '{{ translate('Resume upload') }}',
            pause_upload: '{{ translate('Pause upload') }}',
            retry_upload: '{{ translate('Retry upload') }}',
            cancel_upload: '{{ translate('Cancel upload') }}',
            uploading: '{{ translate('Uploading') }}',
            processing: '{{ translate('Processing') }}',
            complete: '{{ translate('Complete') }}',
            file: '{{ translate('File') }}',
            files: '{{ translate('Files') }}',
        }
	</script>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index-2.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-white.png') }}" alt=""
                                        height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-white.png') }}" alt=""
                                        height="17">
                                </span>
                            </a>

                            <a href="index-2.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-white.png') }}" alt=""
                                        height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-white.png') }}" alt=""
                                        height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->

                    </div>

                    <div class="d-flex align-items-center">



                        <div class="dropdown topbar-head-dropdown ms-1 header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class='bx bx-bell fs-22'></i>
                                <span
                                    class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span
                                        class="visually-hidden">unread messages</span></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">

                                <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                            </div>
                                            <div class="col-auto dropdown-tabs">
                                                <span class="badge badge-soft-light fs-13"> 4 New</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-2 pt-2">
                                        <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                            id="notificationItemsTab" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab"
                                                    role="tab" aria-selected="true">
                                                    All (4)
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages-tab"
                                                    role="tab" aria-selected="false">
                                                    Messages
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab"
                                                    role="tab" aria-selected="false">
                                                    Alerts
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <div class="tab-content" id="notificationItemsTabContent">
                                    <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab"
                                        role="tabpanel">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            <div
                                                class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3">
                                                        <span
                                                            class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                            <i class="bx bx-badge-check"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-2 lh-base">Your <b>Elite</b> author
                                                                Graphic
                                                                Optimization <span class="text-secondary">reward</span>
                                                                is
                                                                ready!
                                                            </h6>
                                                        </a>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> Just 30 sec
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="all-notification-check01">
                                                            <label class="form-check-label"
                                                                for="all-notification-check01"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="text-reset notification-item d-block dropdown-item position-relative active">
                                                <div class="d-flex">
                                                    <img src="{{ asset('') }}images/users/avatar-2.jpg"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">Answered to your comment on the cash flow
                                                                forecast's
                                                                graph 🔔.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 48 min
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="all-notification-check02" checked>
                                                            <label class="form-check-label"
                                                                for="all-notification-check02"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3">
                                                        <span
                                                            class="avatar-title bg-soft-danger text-danger rounded-circle fs-16">
                                                            <i class='bx bx-message-square-dots'></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-2 fs-13 lh-base">You have received <b
                                                                    class="text-success">20</b> new messages in the
                                                                conversation
                                                            </h6>
                                                        </a>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 2 hrs
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="all-notification-check03">
                                                            <label class="form-check-label"
                                                                for="all-notification-check03"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <img src="assets/images/users/avatar-8.jpg"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.
                                                            </p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 4 hrs
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="all-notification-check04">
                                                            <label class="form-check-label"
                                                                for="all-notification-check04"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="my-3 text-center">
                                                <button type="button"
                                                    class="btn btn-soft-success waves-effect waves-light">View
                                                    All Notifications <i
                                                        class="ri-arrow-right-line align-middle"></i></button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel"
                                        aria-labelledby="messages-tab">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="assets/images/users/avatar-3.jpg"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">James Lemire</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.
                                                            </p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 30 min
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="messages-notification-check01">
                                                            <label class="form-check-label"
                                                                for="messages-notification-check01"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="assets/images/users/avatar-2.jpg"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">Answered to your comment on the cash flow
                                                                forecast's
                                                                graph 🔔.</p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 2 hrs
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="messages-notification-check02">
                                                            <label class="form-check-label"
                                                                for="messages-notification-check02"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="assets/images/users/avatar-6.jpg"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Kenneth Brown</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">Mentionned you in his comment on 📃
                                                                invoice #12501.
                                                            </p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 10 hrs
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="messages-notification-check03">
                                                            <label class="form-check-label"
                                                                for="messages-notification-check03"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-reset notification-item d-block dropdown-item">
                                                <div class="d-flex">
                                                    <img src="assets/images/users/avatar-8.jpg"
                                                        class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                    <div class="flex-1">
                                                        <a href="#!" class="stretched-link">
                                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                                        </a>
                                                        <div class="fs-13 text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.
                                                            </p>
                                                        </div>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 3 days
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-15">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="messages-notification-check04">
                                                            <label class="form-check-label"
                                                                for="messages-notification-check04"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="my-3 text-center">
                                                <button type="button"
                                                    class="btn btn-soft-success waves-effect waves-light">View
                                                    All Messages <i
                                                        class="ri-arrow-right-line align-middle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel"
                                        aria-labelledby="alerts-tab">
                                        <div class="w-25 w-sm-50 pt-3 mx-auto">
                                            <img src="{{ asset('') }}/images/svg/bell.svg" class="img-fluid"
                                                alt="user-pic">
                                        </div>
                                        <div class="text-center pb-5 mt-2">
                                            <h6 class="fs-18 fw-semibold lh-base">Hey! You have no any notifications
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{ asset('') }}images/users/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Session::get('loginId')['username'] }}</span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ Session::get('loginId')['username'] }}!</h6>
                                <a class="dropdown-item" href="pages-profile.html"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>


                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="pages-profile-settings.html"><i
                                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Settings</span></a>

                                <a class="dropdown-item" href="/logout/"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="/admin" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-white.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-white.png') }}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="/admin" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-white-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                       @if (is_null(get_setting('admin_logo')) OR get_setting('admin_logo')=='')

                       <img src="{{ asset('assets/images/logo-white.png') }}" alt="" height="50">
                       @else
                       <img src="{{ get_uploaded_image_url(get_setting('admin_logo')) }}" alt="" height="50">
                       @endif 
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
            <div id="scrollbar" data-simplebar class="h-100">
                <div class="container-fluid">
                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <!--<li class="menu-title"><span data-key="t-menu">Menu</span></li>-->
                        <a href="/admin/" class="nav-link menu-link {{ Request::is('admin') ? 'active' : '' }}"> <i
                                class="las la-tachometer-alt"></i> <span data-key="t-dashboards">Dashboards
                            </span></a>

                          
                        <!-- Products Menu -->

                        @php
                            $permission = DB::table('permissions')
                                ->where('name', Session::get('loginId')['roles'])
                                ->get()
                                ->first();
                            if (!is_null($permission->sections)) {
                                $section = json_decode($permission->sections, true);
                            } else {
                                $section = [];
                            }
                        @endphp

                        @if (in_array('products', $section))
                            <li class="nav-item">   


                                <a class="nav-link menu-link {{ Request::is('admin/products/*') ? 'active ' : '' }}"
                                    href="#sidebar-products" data-bs-toggle="collapse" onclick="forarrow()"
                                    aria-expanded="{{ Request::is('admin/products/*') ? 'true' : 'false' }}" aria-controls="sidebarDashboards" id="toggleclass">
                                    <i class="las la-archive"></i> <span data-key="t-dashboards">Products</span>
                                </a>

                                <div class=" {{ Request::is('admin/products/*') ? 'show' : 'collapse' }}  menu-dropdown"
                                    id="sidebar-products">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.all_products') }}"
                                                class="nav-link {{ Request::is(is_route('admin.all_products')) ? 'active' : '' }}">All
                                                Products</a>
                                        </li>
                                        <li class="nav-item">
                                           
                                            <a href="{{ route('admin.add_product') }} "
                                             class="nav-link {{ Request::is(is_route('admin.add_product')) ? 'active' : '' }}">Add
                                                Product</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.productCategories') }}"
                                                class="nav-link {{ Request::is(is_route('admin.productCategories')) ? 'active' : '' }}">Categories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.brands') }}"
                                             class="nav-link {{ Request::is(is_route('admin.brands')) ? 'active' : '' }}">Brands</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('admin.product.tag') }}"
                                             class="nav-link {{ Request::is(is_route('admin.product.tag')) ? 'active' : '' }}">Tags</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.attribute') }}" 
                                            class="nav-link  {{ Request::is(is_route('admin.attribute')) ? 'active' : '' }}" >Attributes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.product_excel_export') }}"
                                                class="nav-link {{ Request::is(is_route('admin.product_excel_export')) ? 'active' : '' }}">Import/Export</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if (in_array('ecommerce', $section))
                            <!-- Ecommerce Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{ Request::is('admin/ecommerce/*') ? 'active ' : '' }}" href="#sidebar-ecommerce" data-bs-toggle="collapse" onclick="forarrow()"
                                    role="button" aria-expanded="false" aria-controls="sidebarDashboards"  id="toggleclass">
                                    <i class="las la-shopping-cart"></i> <span
                                        data-key="t-dashboards">Ecommerce</span>
                                </a>
                                <div class="collapse menu-dropdown {{ Request::is('admin/ecommerce/*') ? 'show' : 'collapse' }}" id="sidebar-ecommerce">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="/admin/orders" class="nav-link">Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin/invoices" class="nav-link">Invoices</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.coupons') }}" class="nav-link {{ Request::is(is_route('admin.coupons')) ? 'active' : '' }}">Coupons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin/shipping-methods" class="nav-link">Shipping Methods</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.paymentmethods') }}" class="nav-link {{ Request::is(is_route('admin.paymentmethods')) ? 'active' : '' }}">Payment Methods</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.reviews') }}" class="nav-link">Product
                                                Reviews</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <!-- image library -->
                        <!-- <li class="nav-item">
                        <a class="nav-link menu-link" href="/admin/image/upload/"  aria-controls="sidebarDashboards">
                        <i class="las la-image"></i> <span data-key="t-dashboards">Library</span>
                        </a>
                        
                    </li>-->
                        <!-- Wallet Menu -->
                        @if (in_array('wallets', $section))
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebar-wallet" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="las la-wallet"></i> <span data-key="t-dashboards">Wallets</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebar-wallet">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="/admin/addCategory" class="nav-link">Wallets History</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <!-- Blog Menu -->
                        @if (in_array('blog', $section))
                            <li class="nav-item">
                                <a class="nav-link menu-link  {{ Request::is('admin/blog/*') ? 'active ' : '' }}" href="#sidebar-blog" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="las la-pager"></i> <span data-key="t-dashboards">Blog</span>
                                </a>
                                <div class="collapse menu-dropdown {{ Request::is('admin/blog/*') ? 'show' : 'collapse' }}" id="sidebar-blog">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.blog.post') }}" class="nav-link {{ Request::is(is_route('admin.blog.post')) ? 'active' : '' }}">All Posts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.blog.add_post') }}" class="nav-link {{ Request::is(is_route('admin.blog.add_post')) ? 'active' : '' }}">Add New Post</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.blog.category') }}" class="nav-link  {{ Request::is(is_route('admin.blog.category')) ? 'active' : '' }}">Categories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.blog.tag') }}" class="nav-link  {{ Request::is(is_route('admin.blog.tag')) ? 'active' : '' }}">Tags</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <a href="{{ url('admin/uploaded-files') }}" class="nav-link menu-link {{ Request::is('admin/uploaded-files') ? 'active' : '' }}"> 
							<i class="las la-image"></i> 
							<span data-key="t-dashboards">Media</span>
						</a>

                        @if (in_array('cms', $section))
                            <!-- CMS Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link  {{ Request::is('admin/cms/*') ? 'active ' : '' }}" href="#sidebar-cms" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                    <i class="las la-pager"></i> <span data-key="t-dashboards">CMS</span>
                                </a>
                                <div class="collapse menu-dropdown {{ Request::is('admin/cms/*') ? 'show' : 'collapse' }} " id="sidebar-cms">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.cms.page') }}" class="nav-link {{ Request::is(is_route('admin.cms.page')) ? 'active' : '' }}">All Pages</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.cms.add_page') }}" class="nav-link {{ Request::is(is_route('admin.cms.add_page')) ? 'active' : '' }}">Add Page</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin/addCategory" class="nav-link">Faqs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin/addCategory" class="nav-link">Testimonials</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin/addCategory" class="nav-link">Menus</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if (in_array('customers', $section))
                            <!-- Customers Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{ Request::is('admin/customers/*') ? 'active ' : '' }}" href="#sidebar-customers" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                    <i class="las la-user"></i> <span data-key="t-layouts">Customers</span>
                                </a>
                                <div class="collapse menu-dropdown {{ Request::is('admin/customers/*') ? 'show' : 'collapse' }}" id="sidebar-customers">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.customers') }}" class="nav-link {{ Request::is(is_route('admin.customers')) ? 'active' : '' }}">All Customers</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if (in_array('dealers', $section))
                            <!-- Dealers Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{ Request::is('admin/dealer*') ? 'active ' : '' }} " href="#sidebar-dealers" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                    <i class="las la-user"></i> <span data-key="t-layouts">Dealers</span>
                                </a>
                                <div class="collapse menu-dropdown {{ Request::is('admin/dealer*') ? 'show' : 'collapse' }}" id="sidebar-dealers">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.dealer') }}" class="nav-link  {{ Request::is(is_route('admin.dealer')) ? 'active' : '' }}">All Dealers</a>
                                        </li>
                                       {{--  <li class="nav-item">
                                            <a href="/admin/addAdmin" class="nav-link">Add Dealer</a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a href="{{route('admin.dealers.pending')}}" class="nav-link">Pending Requests</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin.dealers.rejected')}}" class="nav-link">Rejected Dealers</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if (in_array('sales_person', $section))
                            <!-- Sales Person Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{ Request::is('admin/salesperson*') ? 'active ' : '' }}" href="#sidebar-sales-person" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                    <i class="las la-user"></i> <span data-key="t-layouts">Sales Person</span>
                                </a>
                                <div class="collapse menu-dropdown {{ Request::is('admin/salesperson*') ? 'show' : 'collapse' }}" id="sidebar-sales-person">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.salesperson') }}" class="nav-link  {{ Request::is(is_route('admin.salesperson')) ? 'active' : '' }}">All Sales Person</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if (in_array('users', $section))
                            <!-- Users Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{ Request::is('admin/users*') ? 'active ' : '' }}" href="#sidebar-users" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                    <i class="las la-users"></i> <span data-key="t-layouts">Users</span>
                                </a>
                                <div class="collapse menu-dropdown {{ Request::is('admin/users*') ? 'show' : 'collapse' }}" id="sidebar-users">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.users') }}" class="nav-link  {{ Request::is(is_route('admin.users')) ? 'active' : '' }}">All Users</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                        @endif

                        @if (in_array('settings', $section))
                            <!-- Settings Menu -->
                            <li class="nav-item">
                                <a class="nav-link menu-link {{ Request::is('admin/settings/*') ? 'active ' : '' }}" href="#sidebar-settings" data-bs-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                    <i class="las la-cog"></i> <span data-key="t-layouts">Settings</span>
                                </a>
                                <div class="collapse menu-dropdown {{ Request::is('admin/settings/*') ? 'show' : 'collapse' }}" id="sidebar-settings">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.setting.system') }}" class="nav-link {{ Request::is(is_route('admin.setting.system')) ? 'active' : '' }}">General Settings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.all_permission') }}" 
                                            class="nav-link {{ Request::is(is_route('admin.all_permission')) ? 'active' : '' }}">Roles &
                                                Permissions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.setting.social') }}" class="nav-link {{ Request::is(is_route('admin.setting.social')) ? 'active' : ''  }}">Social Login
                                                Settings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin/shipping-settings" class="nav-link">Shipping settings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin/settings/emails/" class="nav-link">SMTP Settings</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin/siteSetting" class="nav-link">Email Notifications</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin/siteSetting" class="nav-link">Invoice Templates</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/admin/siteSetting" class="nav-link">Vending Machine</a>
                                        </li>
                                        <!--<li class="nav-item">
                                <a href="/admin/siteSetting" class="nav-link">Custom CSS/JS</a>
                            </li>-->
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
            <div class="sidebar-background"></div>
        </div>
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">@yield('page_name')</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="/admin/">Dashboards</a></li>
                                        <li class="breadcrumb-item active">@yield('page_name')</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © {{ get_setting('title') }}.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by {{ get_setting('title') }}
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT --> 
    <script src="{{ asset('js/vendors.js') }}"></script>
    <script src="{{ asset('js/aiz-core.js') }}"></script>
   
    <script type="text/javascript">
		$(document).ready(function() {
			AIZ.plugins.aizUppy();
		});
	</script>

    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
    <!--datatable js-->
    <!--<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>-->


     <script src="{{ asset('js/pages/datatables.init.js') }}"></script> 



    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('js/pages/dashboard-ecommerce.init.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>
	<!-- Validate js -->
	<script src="{{asset('js/jquery.validate.js')}}"></script>
    <!-- App js -->
    <script src="{{ asset('js/apps.js') }}"></script>
    <!-- list.js min js -->
   

	
    @include('sweetalert::alert')
@yield('modal')
    @yield('modalAjax')
    @yield('scripts')


    <script>
        // $(document).ready(function() {
           function forarrow(){
            // $(this).click(function(e) {
               
            //     $("#toggleclass").toggleClass("collapsed");
              

            // });
           } 
        // });

        $(document).on('click', '#toggleclass' , function(){ 
            $(this).toggleClass("collapsed"); 
        });
    </script>
  
   <script type="text/javascript">
    @foreach (session('flash_notification', collect())->toArray() as $message)
        AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
    @endforeach
</script>
</body>

</html>
