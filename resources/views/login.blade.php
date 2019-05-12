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
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<div class="page parallel">
    <div class="d-flex row">
        <div class="col-md-3 white">
            <div class="p-5 mt-5">
                <img style="width=60%; height=60%;" src="assets/img/icon/logobaturaja.png" alt=""/>
            </div>
            <div class="p-5">
                <h3>Welcome Back</h3>
                <p>Sistem Informasi Manajemen Surat</p>
                <form action="{{ URl('login') }}" method="post">
                    <fieldset>
                        @csrf
                        <div class="form-group">
                            <input type="text" name="nik" class="form-control form-control-lg"
                                placeholder="NIK Pegawai">
                        </div>
                        <div class="form-group">
                            
                            <select name="id_jabatan"  class="form-control has-icon form-control-lg has-icon" required="">
                                <option>Jabatan</option>
                                <?php  foreach ($jabatan as $value) : ?>
                                    <option value="<?php echo $value['id_jabatan']; ?>"><?php echo $value['nama_jabatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg"
                                placeholder="Password">
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In">
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-9  height-full blue accent-3 align-self-center text-center" data-bg-repeat="false"
             data-bg-possition="center"
             style="background: url('assets/img/icon/logobaturaja.png') #FFEFE4; width:400px; height:200px">
        </div>
    </div>
</div>
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>




<!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
</body>
</html>

