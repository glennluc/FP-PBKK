@extends('layouts.template')

@section('content')
<header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
                        User
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link" href="{{ URL('admin/get-user')}}"><i class="icon icon-home2"></i>Seluruh Users</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link active"  href="{{ URL('admin/create-user')}}" ><i class="icon icon-plus-circle"></i> Tambah User</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
<div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form accept-charset="UTF-8" role="form" action="{{ URl('admin/create-user') }}" method="post">
                        <fieldset>
                        @csrf
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <h5 class="card-title">Add User</h5>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="nik" class="col-form-label s-12">NIK</label>
                                            <input name="nik" placeholder="Masukan NIK Pegawai" class="form-control r-0 light s-12 " type="text">
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="username" class="col-form-label s-12">Username</label>
                                            <input name="username" placeholder="Masukan Username" class="form-control r-0 light s-12 " type="text">
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="name" class="col-form-label s-12">Nama User</label>
                                            <input name="name" placeholder="Masukkan Nama Pegawai" class="form-control r-0 light s-12 " type="text">
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="dob" class="col-form-label s-12">Jenis Kelamin</label>
                                            <br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="male" value="laki-laki" name="jenis_kelamin" class="custom-control-input">
                                                <label class="custom-control-label m-2" for="male">Laki - Laki</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="female" value="perempuan" name="jenis_kelamin" class="custom-control-input">
                                                <label class="custom-control-label m-2" for="female">Perempuan</label>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                                <label for="noHP" class="col-form-label s-12">No Handphone</label>
                                                <input name="no_hp" placeholder="Masukkan No HP Pegawai" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label for="tgl_lahir" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>Tanggal Lahir</label>
                                                <input name="tgl_lahir" placeholder="Pilih Tanggal Lahir Pegawai" class="form-control r-0 light s-12 datePicker" data-time-picker="true"
                                                       data-format-date='Y/m/d' type="date">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                                <label for="email" class="col-form-label s-12"><i class="icon-envelope-o mr-2"></i>Email</label>
                                                <input name="email" placeholder="Masukkan Email Pegawai" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label for="password" class="col-form-label s-12"><i class="icon-user mr-2"></i>Password</label>
                                                <input name="password" placeholder="Masukkan Password Pegawai" class="form-control r-0 light s-12 " type="password">
                                            </div>
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="alamat" class="col-form-label s-12">Alamat</label>
                                            <textarea name="alamat" placeholder="Masukkan Alamat Pegawai" class="form-control r-0 light s-12 " type="text"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h5 class="card-title">Jabatan di Perusahaan</h5>
                                <div class="form-row">
                                    <div class="form-group col-6 m-0">
                                        <label for="roll1" class="col-form-label s-12">Bagian</label>
                                        <select name="id_bagian" class="form-control r-0 light s-12" required="">
                                            <option>Bagian</option>
                                            <?php  foreach ($bagian as $value) : ?>
                                            <option value="{{$value->id_bagian}}">{{$value->nama_bagian}}</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-6 m-0">
                                        <label for="roll1" class="col-form-label s-12">Jabatan</label>
                                        <select name="id_jabatan" class="form-control r-0 light s-12" required="">
                                            <option>Jabatan</option>
                                            <?php  foreach ($jabatan as $value) : ?>
                                            <option value="{{$value->id_jabatan}}">{{$value->nama_jabatan}}</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-6 m-0">
                                        <label for="roll1" class="col-form-label s-12">Root Jabatan</label>
                                        <select name="id_rootJab" class="form-control r-0 light s-12" required="">
                                            <option>Root Jabatan</option>
                                            <?php  foreach ($rootjabatan as $value) : ?>
                                            <option value="{{$value->id_rootJab}}">{{$value->root_jab}}</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-6 m-0">
                                        <label for="roll1" class="col-form-label s-12">Authority</label>
                                        <select name="authority" class="form-control r-0 light s-12" required="">
                                            <option>Authority</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                            <option value="sekretaris">Sekretaris</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        </div>
                        </fieldset>
                    </form>
                </div>
            </div>
    </div>
    </div>
@endsection