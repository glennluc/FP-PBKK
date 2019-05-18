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
                        <a class="nav-link" href="{{ URL('admin/get-bagian')}}"><i class="icon icon-home2"></i>Atur Bagian</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link active"  href="{{ URL('admin/create-user')}}" ><i class="icon icon-plus-circle"></i> Tambah Bagian Baru</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
<div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form accept-charset="UTF-8" role="form" action="{{ URl('admin/create-bagian') }}" method="post">
                        <fieldset>
                        @csrf
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <h5 class="card-title">Add Bagian</h5>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="kode_bagian" class="col-form-label s-12">Kode Bagian</label>
                                            <input name="kode_bagian" placeholder="Masukan Kode Bagian" class="form-control r-0 light s-12 " type="text">
                                        </div>

                                        <div class="form-group m-0">
                                            <label for="nama_bagian" class="col-form-label s-12">Nama Bagian</label>
                                            <input name="nama_bagian" placeholder="Masukan Nama Bagian" class="form-control r-0 light s-12 " type="text">
                                        </div>

                                        <div class="form-group m-0">
                                            <label for="Keterangan" class="col-form-label s-12">Keterangan</label>
                                            <input name="keterangan" placeholder="Masukkan Keterangan" class="form-control r-0 light s-12 " type="text">
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