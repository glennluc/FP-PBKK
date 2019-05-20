@extends('layouts.template')

@section('content')
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
                        Disposisi Surat
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link" href="{{ URL('admin/get-disposisi')}}"><i class="icon icon-home2"></i>Lihat
                            Seluruh Disposisi</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link" href="{{ URL('admin/pilih-disposisi')}}"><i
                                    class="icon icon-plus-circle"></i> Lihat Surat</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link active" href="{{ URL('admin/create-surat')}}"><i
                                    class="icon icon-plus-circle"></i> Tambah Disposisi Baru</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form accept-charset="UTF-8" role="form" action="{{ URl('admin/create-disposisi') }}" method="post"
                          enctype="multipart/form-data">
                        <fieldset>
                            @csrf
                            <div class="card no-b  no-r">
                                <div class="card-body">
                                    <h5 class="card-title">Add Disposisi</h5>
                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <input type="hidden" class="form-control disabled" id="id_surats"
                                                   name="id_surats"
                                                   value="{{$disposisi->id_surats}}" required>
                                            <div class="form-group m-0">
                                                <label for="no_surats" class="col-form-label s-12">No Surat</label>
                                                <input name="no_surats" class="form-control r-0 light s-12 "
                                                       value="{{$disposisi->no_surat}}" readonly>
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="untuk" class="col-form-label s-12">Kepada</label>
                                                <input class="form-control r-0 light s-12 "
                                                       value="{{$disposisi->name}}">
                                                <input name="untuk" class="form-control r-0 light s-12 "
                                                       value="{{$disposisi->id_user}}" type="hidden">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="dari" class="col-form-label s-12">Oleh</label>
                                                <input id="test" name="dari" value="{{\Illuminate\Support\Facades\Session::get('clog')}}"
                                                       class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="keterangan_disposisi" class="col-form-label s-12">Keterangan Disposisi</label>
                                                <input name="keterangan_disposisi" class="form-control r-0 light s-12 "
                                                       type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="tipe_surat_disposisi" class="col-form-label s-12">Tipe Surat
                                                    Disposisi</label>
                                                <select name="tipe_surat_disposisi" class="form-control r-0 light s-12"
                                                        required="">
                                                    <option value="internal">internal</option>
                                                    <option value="eksternal">eksternal</option>
                                                </select>
                                            </div>
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