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
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="{{ URL('admin/get-disposisi')}}"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Lihat Disposisi</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link" href="{{ URL('admin/pilih-disposisi')}}"><i
                                    class="icon icon-plus-circle"></i> Lihat Surat</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            <th>No</th>
                                            <th>ID Surat</th>
                                            <th>No Surat</th>
                                            <th>Oleh</th>
                                            <th>Kepada</th>
                                            <th>Disposisi Status</th>
                                            <th>Status Surat Disposisi</th>
                                            <th>Tipe Surat Disposisi</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Tembusan</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($disposisi as $row) { ?>
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->id_surats}}</td>
                                            <td>{{$row->no_surat}}</td>
                                            <td>{{$row->dari}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->keterangan_disposisi}}</td>
                                            <td>{{$row->status_surat_disposisi}}</td>
                                            <td>{{$row->tipe_surat_disposisi}}</td>
                                            <td>{{$row->tanggal_disposisi}}</td>
                                            <td>{{$row->waktu_disposisi}}</td>
                                            <td>
                                                <a href="{{URL('admin/edit-disposisi/'.$row->id_disposisi)}}"><i class="icon-pencil mr-3"></i></a>
                                                <a href="{{URL('admin/delete-disposisi/'.$row->id_disposisi)}}"><i class="icon-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php  }  ?>

                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection