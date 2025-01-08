<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Account</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin/images/logo/favicon.png')}}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{asset('admin/css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                    <img src="{{ asset('images/general_settings/' . $logo->value) }}" style="width:50px;height:50px" alt="Logo">
                    <img class="logo-fold" src="{{ asset('images/general_settings/' . $logo->value) }}" style="width:50px;height:50px" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white" style="margin-top:15px !important">
                    <a href="/" target="_blank">
                    <img src="{{ asset('images/general_settings/' . $logo->value) }}" style="width:50px;height:50px" alt="Logo">
                    <img class="logo-fold" src="{{ asset('images/general_settings/' . $logo->value) }}" style="width:50px;height:50px"  alt="Logo">
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
                    <!-- <ul class="nav-right">

                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="{{asset('admin/images/avatars/thumb-3.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="{{asset('admin/images/avatars/thumb-3.jpg')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">{{Auth::user()->name}}</p>
                                            <p class="m-b-0 opacity-07">
                                                @if(Auth::user()->id == 1)
                                                System Admin
                                                @else
                                                Admin
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <a href="/logout" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </li>

                    </ul> -->
                </div>
            </div>
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown open">
                            <a href="{{route('customer.dashboard')}}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>

                            </a>

                        </li>

                        <li class="nav-item dropdown open">
                            <a href="/">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Shopping</span>

                            </a>

                        </li>

                        <li class="nav-item dropdown open">
                            <a href="/auth/order">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Order</span>

                            </a>

                        </li>

                       

                        <li class="nav-item dropdown open">
                            <a href="/cart">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Cart</span>

                            </a>

                        </li>

                       
                        <li class="nav-item dropdown open">
                            <a href="/auth/general_settings">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">Setting</span>

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

</body>

</html>