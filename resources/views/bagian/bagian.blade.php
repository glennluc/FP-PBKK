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
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="{{ URL('admin/get-bagian')}}"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>Atur Bagian</a>
                    </li>
                    <li class="float-right">
                        <a class="nav-link"  href="{{ URL('admin/create-bagian')}}" ><i class="icon icon-plus-circle"></i> Tambah Bagian</a>
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
                                            <th>No</th>
                                            <th>Kode Bagian</th>
                                            <th>Nama Bagian</th>
                                            <th>Keterangan</th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($bagian as $row) { ?>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_1" required><label
                                                        class="custom-control-label" for="user_id_1"></label>
                                                </div>
                                            </td>

                                            <td>{{$no++}}</td>
                                            <td>{{$row->kode_bagian}}</td>
                                            <td><span class="r-3 badge badge-success ">{{$row->nama_bagian}}</span></td>
                                            <td>{{$row->keterangan}}</td>
                                            <td>
                                                <a href="panel-page-profile.html"><i class="icon-eye mr-3"></i></a>
                                                <a href="{{URL('admin/edit-bagian/'.$row->id_bagian)}}"><i class="icon-pencil mr-3"></i></a>
                                                <a href="{{URL('admin/delete-bagian/'.$row->id_bagian)}}"><i class="icon-trash"></i></a>
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