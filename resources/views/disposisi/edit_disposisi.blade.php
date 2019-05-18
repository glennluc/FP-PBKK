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
                        <a class="nav-link" href="{{ URL('admin/get-disposisi')}}"><i class="icon icon-home2"></i>All Disposisi</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link active" href="{{ URL('admin/create-disposisi')}}"><i
                                    class="icon icon-plus-circle"></i> Add New Disposisi</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form accept-charset="UTF-8" role="form" action="{{ URl('admin/edit-disposisi') }}" method="post"
                          enctype="multipart/form-data">
                        <fieldset>
                            @csrf
                            <div class="card no-b  no-r">
                                <div class="card-body">
                                    <h5 class="card-title">Edit Disposisi</h5>
                                    <div class="form-row">
                                     @foreach ($disposisi as $value)
                                     @endforeach
                                        <div class="col-md-8">
                                            
                                            <div class="form-group m-0">
                                                <label for="id_surats" class="col-form-label s-12">ID Surat</label>
                                                <select name="id_surats" class="form-control r-0 light s-12" required="">
                                                    <option value="{{$value->id_surats}}">{{$value->id_surats}}</option>
                                                    <?php  foreach ($surat as $value) : ?>
                                                    <option value="{{$value->id_surat}}">{{$value->id_surat}}</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="dari" class="col-form-label s-12">Dari</label>
                                                <input name="dari" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="untuk" class="col-form-label s-12">Untuk</label>
                                                <input name="untuk" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="disposisi_status" class="col-form-label s-12">Disposisi Status</label>
                                                <input name="disposisi_status" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="status_surat_disposisi" class="col-form-label s-12">Status Surat Disposisi</label>
                                                <input name="status_surat_disposisi" class="form-control r-0 light s-12 " type="text">
                                            </div>
                                            <div class="form-group m-0">
                                                <label for="tipe_surat_disposisi" class="col-form-label s-12">Tipe Surat Disposisi</label>
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