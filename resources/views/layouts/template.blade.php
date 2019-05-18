<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assets/img/basic/favicon.ico') }}" type="image/x-icon">
    <title>SI Surat</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <!-- Js -->
    <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
    <script>(function (w, d, u) {
            w.readyQ = [];
            w.bindReadyQ = [];

            function p(x, y) {
                if (x == "ready") {
                    w.bindReadyQ.push(y);
                } else {
                    w.readyQ.push(x);
                }
            };var a = {ready: p, bind: p};
            w.$ = w.jQuery = function (f) {
                if (f === d || f === u) {
                    return a
                } else {
                    p(f)
                }
            }
        })(window, document)</script>
</head>
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<body class="light">
<div id="app">
    <aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
        <section class="sidebar">
            <div class="w-100px mt-3 mb-3 ml-3">
                <img src="{{asset('assets/img/icon/logobaturaja.png')}}" alt="">
            </div>
            <div class="relative">
                <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
                   aria-controls="userSettingsCollapse"
                   class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                    <i class="icon icon-cogs"></i>
                </a>
                <div class="user-panel p-3 light mb-2">
                    <div>
                        <div class="float-left image">
                            <img class="user_avatar" src="{{asset('assets/img/dummy/u2.png')}}" alt="User Image">
                        </div>
                        <div class="float-left info">
                            {{--@foreach ($user as $value)--}}
                            <h6 class="font-weight-light mt-2 mb-1">{{\Illuminate\Support\Facades\Session::get('clog')}}</h6>
                            <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                            {{--@endforeach--}}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="collapse multi-collapse" id="userSettingsCollapse">
                        <div class="list-group mt-3 shadow">
                            <a href="index-2.html" class="list-group-item list-group-item-action ">
                                <i class="mr-2 icon-umbrella text-blue"></i>Profile
                            </a>
                            <a href="#" class="list-group-item list-group-item-action"><i
                                        class="mr-2 icon-security text-purple"></i>Change Password</a>
                            <a href="{{url('logout')}}" class="list-group-item list-group-item-action"><i
                                        class="mr-2 icon-cogs text-yellow"></i>Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header"><strong>MAIN NAVIGATION</strong></li>
                <li class="treeview"><a href="{{URL('admin/dashboard')}}">
                        <i class="icon icon-sailing-boat-water purple-text s-18"></i> <span>Dashboard</span>
                    </a>

                </li>
                <li class="treeview"><a href="#">
                        <i class="icon icon icon-package blue-text s-18"></i>
                        <span>Products</span>
                        <span class="badge r-3 badge-primary pull-right">4</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="panel-page-products.html"><i class="icon icon-circle-o"></i>All Products</a>
                        </li>
                        <li><a href="panel-page-products-create.html"><i class="icon icon-add"></i>Add
                                New </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="icon icon-account_box light-green-text s-18"></i>Management<i
                                class="icon icon-angle-left s-18 pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL('admin/get-user')}}"><i class="icon icon-circle-o"></i>User</a></li>
                        <li><a href="{{URL('admin/get-bagian')}}"><i class="icon icon-circle-o"></i>Bagian</a></li>
                        <li><a href="{{URL('admin/get-jabatan')}}"><i class="icon icon-circle-o"></i>Jabatan</a></li>
                        <li><a href="{{URL('admin/get-rootjab')}}"><i class="icon icon-circle-o"></i>Root Jabatan</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview no-b"><a href="#">
                        <i class="icon icon-package light-green-text s-18"></i>
                        <span>Surat</span>
                        <span class="badge r-3 badge-success pull-right">20</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL('admin/get-surat')}}"><i class="icon icon-circle-o"></i>Surat
                                Masuk/Keluar</a>
                        </li>
                        <li><a href="{{URL('admin/get-laporan')}}"><i class="icon icon-circle-o"></i>Laporan Surat
                                Masuk/Keluar</a>
                        </li>
                        <li><a href="{{URL('admin/get-arsipsurat')}}"><i class="icon icon-circle-o"></i>Arsip Surat</a>
                        </li>
                        <li><a href="{{URL('admin/get-disposisi')}}"><i class="icon icon-circle-o"></i>Disposisi</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    <!--Sidebar End-->
    <div class="has-sidebar-left">
        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                    <div class="search-bar">
                        <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                               placeholder="start typing...">
                    </div>
                    <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
                       aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
                </div>
            </div>
        </div>

    </section>
    </aside>
@yield('content')

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    var msg = '{{Session::get('popup')}}';
    var exist = '{{Session::has('popup')}}';
    if(exist){
        alert(msg);
    }
</script>


<!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
<script>(function ($, d) {
        $.each(readyQ, function (i, f) {
            $(f)
        });
        $.each(bindReadyQ, function (i, f) {
            $(d).bind("ready", f)
        })
    })(jQuery, document)</script>
</body>
</html>

