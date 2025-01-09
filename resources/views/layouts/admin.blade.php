<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin/images/logo/favicon.png')}}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{asset('admin/css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- CK Editro -->
    <!-- CKEditor 5 Script (add in the head or before the closing body tag) -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include jQuery and Select2 libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

</head>

<body>
    <div class="app">
        <div class="layout">

            @php
            $logo = App\Models\GeneralSetting::where("name","logo")->first();
            @endphp
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark" style="margin-top:15px !important">
                    <a href="/" target="_blank">
                        <img src="{{ asset('images/general_settings/' . $logo->value) }}" style="width:50px;height:50px"
                            alt="Logo">
                        <img class="logo-fold" src="{{ asset('images/general_settings/' . $logo->value) }}"
                            style="width:50px;height:50px" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white" style="margin-top:15px !important">
                    <a href="/" target="_blank">
                        <img src="{{ asset('images/general_settings/' . $logo->value) }}" style="width:50px;height:50px"
                            alt="Logo">
                        <img class="logo-fold" src="{{ asset('images/general_settings/' . $logo->value) }}"
                            style="width:50px;height:50px" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    @if(Auth::user()->role == 1)
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown open">
                            <a href="{{route('admin.dashboard')}}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>

                            </a>

                        </li>

                        <li class="nav-item dropdown open">
                            <a href="/">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Visit Webiste</span>

                            </a>

                        </li>

                        <!-- <li class="nav-item dropdown open">
                            <a href="/admin/sales">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Sale Report</span>

                            </a>

                        </li> -->

                        <li class="nav-item dropdown open">
                            <a href="/admin/orders">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Order</span>

                            </a>

                        </li>

                        <li class="nav-item dropdown open">
                            <a href="/admin/product_categories">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Categroy</span>

                            </a>

                        </li>

                        <!-- <li class="nav-item dropdown open">
                            <a href="/admin/sub_category ">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">SubCategroy</span>

                            </a>

                        </li> -->

                        <li class="nav-item dropdown open">
                            <a href="/admin/brand ">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Brand</span>

                            </a>

                        </li>

                        <!-- <li class="nav-item dropdown open">
                            <a href="/admin/goal ">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Goal</span>

                            </a>

                        </li> -->

                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Product</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('admin.products.create')}}">Single Product Create</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.products.create.varaint')}}">Variant Product Create</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.products.index')}}">View</a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown open">
                            <a href="/admin/supply ">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Supply Log</span>

                            </a>

                        </li>
                        <!-- <li class="nav-item dropdown open">
                            <a href="/admin/cupon ">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Cupon</span>

                            </a>

                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Account
                                </span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/admin/admins">Admin</a>
                                </li>
                                <li>
                                    <a href="/admin/customers">User</a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown open">
                            <a href="/admin/general_settings">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Setting</span>

                            </a>

                        </li>
                        <li class="nav-item dropdown open">
                            <a href="/admin/faq">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">FAQ</span>

                            </a>

                        </li>
                        <li class="nav-item dropdown open">
                            <a href="/admin/feedback">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Customer Feedback</span>

                            </a>

                        </li>
                        <li class="nav-item dropdown open">
                            <a href="/admin/payment_method">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Payment Method</span>

                            </a>

                        </li>
                        <li class="nav-item dropdown open">
                            <a href="/admin/update">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Update</span>

                            </a>

                        </li>
                        <li class="nav-item dropdown open">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="icon-holder">
                                    <i class="anticon anticon-logout"></i>
                                </span>
                                <span class="title">Logout</span>
                            </a>
                        </li>

                    </ul>
                    @endif
                    @if(Auth::user()->role == 3)
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown open">
                            <a href="{{route('admin.dashboard')}}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>

                            </a>

                        </li>

                        <li class="nav-item dropdown open">
                            <a href="/">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Visit Webiste</span>

                            </a>

                        </li>

                        <li class="nav-item dropdown open">
                            <a href="/admin/sales">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Sale Report</span>

                            </a>

                        </li>

                        <li class="nav-item dropdown open">
                            <a href="/admin/orders">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Order</span>

                            </a>

                        </li>







                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Product</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{route('admin.products.create')}}">Single Product Create</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.products.create.varaint')}}">Variant Product Create</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.products.index')}}">View</a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown open">
                            <a href="/admin/supply ">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Supply</span>

                            </a>

                        </li>



                        <li class="nav-item dropdown open">
                            <a href="/admin/feedback">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Customer Feedback</span>

                            </a>

                        </li>


                        <li class="nav-item dropdown open">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="icon-holder">
                                    <i class="anticon anticon-logout"></i>
                                </span>
                                <span class="title">Logout</span>
                            </a>
                        </li>

                    </ul>
                    @endif
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">

                <!-- Content Wrapper START -->
                <div class="main-content">
                    @yield('body')
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0"> Copyright © 2024 </p>

                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->


            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Theme Config</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="m-b-30">
                                <h5 class="m-b-0">Header Color</h5>
                                <p>Config header background color</p>
                                <div class="theme-configurator d-flex m-t-10">
                                    <div class="radio">
                                        <input id="header-default" name="header-theme" type="radio" checked
                                            value="default">
                                        <label for="header-default"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-primary" name="header-theme" type="radio" value="primary">
                                        <label for="header-primary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-success" name="header-theme" type="radio" value="success">
                                        <label for="header-success"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                        <label for="header-secondary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-danger" name="header-theme" type="radio" value="danger">
                                        <label for="header-danger"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Side Nav Dark</h5>
                                <p>Change Side Nav to dark</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                    <label for="side-nav-theme-toogle"></label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Folded Menu</h5>
                                <p>Toggle Folded Menu</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                    <label for="side-nav-fold-toogle"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quick View END -->
        </div>
    </div>

    <!-- Core Vendors JS -->
    <script src="{{asset('admin/js/vendors.min.js')}}"></script>

    <!-- page js -->
    <script src="{{asset('admin/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('admin/js/pages/dashboard-default.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/pages/datatables.js')}}"></script>
    <!-- Core JS -->
    <script src="{{asset('admin/js/app.min.js')}}"></script>
    <!-- SweetAlert2 for error display -->
    @if ($errors->any())
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        html: `
                <ul style="text-align: left;padding-left:20px !important;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
        confirmButtonText: 'OK',
    });
    </script>
    @endif
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        ClassicEditor
            .create(document.querySelector('textarea[name="shortdescription"]'), {
                toolbar: [
                    'bold', 'italic', 'underline', 'strikethrough', 
                    'link', 'bulletedList', 'numberedList', 
                    'blockQuote', 'insertTable', 'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('textarea[name="description"]'), {
                toolbar: [
                    'bold', 'italic', 'underline', 'strikethrough', 
                    'link', 'bulletedList', 'numberedList', 
                    'blockQuote', 'insertTable', 'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>

</body>

</html>