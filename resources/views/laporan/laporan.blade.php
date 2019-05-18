@extends('layouts.template')
<script>
    var msg = '{{Session::get('popup')}}';
    var exist = '{{Session::has('popup')}}';
    if (exist) {
        alert(msg);
    }
</script>
@section('content')

    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
                        Laporan Surat
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill"
                           href="{{ URL('admin/get-bagian')}}"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Surat Masuk/Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel"
                 aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <div class="container">
                                    <div class="row">
                                        <form accept-charset="UTF-8" role="form"
                                              action="{{ URl('admin/show-laporan') }}" method="post"
                                              enctype="multipart/form-data">
                                            <fieldset>
                                                @csrf
                                                <div style="justify-content: center">
                                                    <div class="col-md-4" style="float: left;overflow: hidden;">
                                                        <ul class="nav nav-stacked">
                                                            <label for="dariTanggal" class="col-form-label s-12">Dari
                                                                Tanggal</label>
                                                            <input type="date" name="dariTanggal" class="form-control"
                                                                   id="dateFrom"/>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4" style="float: left;overflow: hidden;">
                                                        <ul class="nav nav-stacked">
                                                            <label for="sampaiTanggal" class="col-form-label s-12">Sampai
                                                                Tanggal</label>
                                                            <input type="date" name="sampaiTanggal" class="form-control"
                                                                   id="dateTo"/>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4" style="float: left;overflow: hidden;">
                                                        <ul class="nav nav-stacked">
                                                            <label for="tipeSurat" class="col-form-label s-12">Tipe
                                                                Surat</label>
                                                            <select name="tipeSurat"
                                                                    class="form-control r-0 light s-12"
                                                                    required="">
                                                                <option>Pilih Tipe Surat</option>
                                                                <option value="internal">Internal</option>
                                                                <option value="eksternal">Eksternal</option>
                                                                <option value="keluar">Keluar</option>
                                                            </select>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" style="margin-top: 60pt">
                                                    <button class="btn btn-primary" type="submit" id="getJsonSrc">
                                                        Search
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Jenis</th>
                                            <th>Tipe</th>
                                            <th>No. Surat</th>
                                            <th>Asal</th>
                                            <th>Dari</th>
                                            <th>Tujuan</th>
                                            <th>Perihal</th>
                                            <th>Tembusan</th>
                                            <th>Status</th>
                                            <th>Disposisi</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($surat as $row) { ?>
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->tanggal_surat}}</td>
                                            <td>{{$row->jenis_surat}}</td>
                                            <td>{{$row->tipe_surat}}</td>
                                            <td>{{$row->no_surat}}</td>
                                            <td>{{$row->asal_surat}}</td>
                                            <td>{{$row->dari}}</td>
                                            <td>{{$row->tujuan_surat_keluar}}</td>
                                            <td>{{$row->perihal}}</td>
                                            <td>{{$row->tembusan}}</td>
                                            <td>{{$row->status_surat}}</td>
                                            <td>{{$row->status_disposisi}}</td>
                                        </tr>
                                        <?php  }  ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection