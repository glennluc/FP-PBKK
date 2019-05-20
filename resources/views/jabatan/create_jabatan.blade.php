@extends('layouts.template')

@section('content')
<header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
                        Bagian
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link" href="{{ URL('admin/get-jabatan')}}"><i class="icon icon-home2"></i>Manage Jabatan</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link active"  href="{{ URL('admin/create-jabatan')}}" ><i class="icon icon-plus-circle"></i>Add Jabatan</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
<div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form accept-charset="UTF-8" role="form" action="{{ URl('admin/create-jabatan') }}" method="post">
                        <fieldset>
                        @csrf
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <h5 class="card-title">Add Jabatan</h5>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="nama_jabatan" class="col-form-label s-12">Nama Jabatan</label>
                                            <input name="nama_jabatan" placeholder="Masukan Nama Jabatan" class="form-control r-0 light s-12 " type="text">
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="id_bagian" class="col-form-label s-12">Bagian</label>
                                            <select name="id_bagian" class="form-control r-0 light s-12" required="">
                                                <option>Bagian</option>
                                                <?php  foreach ($bagian as $value) : ?>
                                                <option value="{{$value->id_bagian}}">{{$value->nama_bagian}}</option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="level" class="col-form-label s-12">Level</label>
                                            <select name="level" class="form-control r-0 light s-12"
                                                        required="">
                                                    <option value="admin">admin</option>
                                                    <option value="user">user</option>
                                                    <option value="sekretaris">sekretaris</option>
                                            </select>                                        
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="parent_jabatan" class="col-form-label s-12">Parent Jabatan</label>
                                            <select name="id_rootJabs" class="form-control r-0 light s-12" required="">
                                            <option>Root Jabatan</option>
                                            <?php  foreach ($rootjabatan as $value) : ?>
                                            <option value="<?php echo $value->id_rootJab ?>|<?php echo $value->root_Jab ?>">{{$value->root_jab}}</option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="keterangan" class="col-form-label s-12">Keterangan</label>
                                            <input name="keterangan" placeholder="Isi Keterangan" class="form-control r-0 light s-12 " type="text">
                                        </div>
                                    </div>                          
                                </div>

                            </div>
                            <hr>
                            
                            
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