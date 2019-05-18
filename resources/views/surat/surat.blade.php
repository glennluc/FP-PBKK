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
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="{{ URL('admin/get-bagian')}}"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Manage Surat</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link"  href="{{ URL('admin/create-surat')}}" ><i class="icon icon-plus-circle"></i> Tambah Surat</a>
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
                                            <th style="width: 30px">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" id="checkedAll" class="custom-control-input"><label
                                                        class="custom-control-label" for="checkedAll"></label>
                                                </div>
                                            </th>
                                            <th>Nomor Surat</th>
                                            <th>Tanggal</th>
                                            <th>Jenis</th>
                                            <th>Tipe</th>
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
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_1" required><label
                                                        class="custom-control-label" for="user_id_1"></label>
                                                </div>
                                            </td>

                                            <td>{{$row->no_surat}}</td>
                                            <td>{{$row->tanggal_surat}}</td>
                                            <td>{{$row->jenis_surat}}</td>
                                            <td>{{$row->tipe_surat}}</td>
                                            <td>{{$row->asal_surat}}</td>
                                            <td>{{$row->dari}}</td>
                                            <td>{{$row->tujuan_surat_keluar}}</td>
                                            <td>{{$row->perihal}}</td>
                                            <td>{{$row->tembusan}}</td>
                                            <td>{{$row->status_surat}}</td>
                                            <td>{{$row->status_disposisi}}</td>
                                            <td>
                                                <a href="{{URL('admin/download-surat/'.$row->id_surat)}}"><i class="icon-eye mr-3"></i></a>
                                                <a href="{{URL('admin/delete-surat/'.$row->id_surat)}}"><i class="icon-trash"></i></a>
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