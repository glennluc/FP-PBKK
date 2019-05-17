@extends('layouts.template')

@section('content')
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
                        Surat
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link" href="{{ URL('admin/get-surat')}}"><i class="icon icon-home2"></i>All Surat</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link active" href="{{ URL('admin/create-surat')}}"><i
                                    class="icon icon-plus-circle"></i> Add New Surat</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form accept-charset="UTF-8" role="form" action="{{ URl('admin/create-surat') }}" method="post"
                          enctype="multipart/form-data">
                        <fieldset>
                            @csrf
                            <div class="card no-b  no-r">
                                <div class="card-body">
                                    <h5 class="card-title">Add Surat</h5>
                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <div class="form-group m-0">
                                                <label for="no_surat" class="col-form-label s-12">Nomor Surat</label>
                                                <input name="no_surat" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="tanggal_surat" class="col-form-label s-12">Tanggal
                                                    Surat</label>
                                                <input type="date" name="tanggal_surat"
                                                       class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="jenis_surat" class="col-form-label s-12">Jenis Surat</label>
                                                <select name="jenis_surat" class="form-control r-0 light s-12"
                                                        required="">
                                                    <option value="private">private</option>
                                                    <option value="penting">penting</option>
                                                    <option value="biasa">biasa</option>
                                                </select>
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="tipe_surat" class="col-form-label s-12">Tipe Surat</label>
                                                <select name="tipe_surat" class="form-control r-0 light s-12"
                                                        required="">
                                                    <option value="internal">internal</option>
                                                    <option value="eksternal">eksternal</option>
                                                    <option value="keluar">keluar</option>
                                                </select>
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="asal_surat" class="col-form-label s-12">Asal Surat</label>
                                                <input name="asal_surat" class="form-control r-0 light s-12 "
                                                       type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="dari" class="col-form-label s-12">Dari</label>
                                                <input name="dari" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <input name="id_users" class="form-control r-0 light s-12 "
                                                   value="{{\Illuminate\Support\Facades\Session::get('clogid')}}"
                                                   type="hidden">
                                            <div class="form-group m-0">
                                                <label for="tujuan_surat_keluar"
                                                       class="col-form-label s-12">Tujuan</label>
                                                <input name="tujuan_surat_keluar" class="form-control r-0 light s-12 "
                                                       type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="perihal" class="col-form-label s-12">Perihal</label>
                                                <input name="perihal" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="tembusan" class="col-form-label s-12">Tembusan</label>
                                                <input name="tembusan" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="no_berkas" class="col-form-label s-12">Nomor Berkas</label>
                                                <input name="no_berkas" class="form-control r-0 light s-12 "
                                                       type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="status_surat" class="col-form-label s-12">Status
                                                    Surat</label>
                                                <input name="status_surat" class="form-control r-0 light s-12 "
                                                       type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="status_disposisi" class="col-form-label s-12">Status
                                                    Disposisi</label>
                                                <input name="status_disposisi" class="form-control r-0 light s-12 "
                                                       type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="file_surat" class="col-form-label s-12">File</label>
                                                <input name="file_surat" class="form-control r-0 light s-12 "
                                                       type="file">
                                            </div>
                                            {{--<div class="form-group m-0">--}}
                                            {{--<label for="file_path" class="col-form-label s-12">File Path</label>--}}
                                            {{--<input name="file_path" class="form-control r-0 light s-12 "--}}
                                            {{--type="text">--}}
                                            {{--</div>--}}
                                            <div class="form-group m-0">
                                                <label for="keterangan" class="col-form-label s-12">Keterangan</label>
                                                <input name="keterangan" class="form-control r-0 light s-12 "
                                                       type="text">
                                            </div>
                                            <!-- <div class="form-group m-0">
                                                <label for="tanggal_entry" class="col-form-label s-12">Tanggal Entry</label>
                                                <input name="tanggal_entry" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="waktu_entry" class="col-form-label s-12">Waktu Entry</label>
                                                <input name="waktu_entry" class="form-control r-0 light s-12 " type="text"> -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save
                                    Data
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection