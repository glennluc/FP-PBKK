@extends('layouts.template')

@section('content')
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="card-header white">
                    <h6> CURRENT STATS </h6>
                </div>
                <div class="card-body p-0">
                    <div class="lightSlider" data-item="6" data-item-xl="4" data-item-md="2" data-item-sm="1"
                         data-pause="7000" data-pager="false" data-auto="true"
                         data-loop="true">
                        @if(\Illuminate\Support\Facades\Session::get('auth') == 'admin' || \Illuminate\Support\Facades\Session::get('auth') == 'sekretaris')
                            <div class="p-5">
                                <h5 class="font-weight-normal s-14">Surat</h5>
                                <span class="s-48 font-weight-lighter light-green-text">{{count($surat)}}</span>
                                <div> Disposisi
                                    <span class="text-light-green">
                        <i class="icon icon-arrow-circle-right"></i> {{count($disposisi_surats)}}</span>
                                </div>
                            </div>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::get('auth') == 'admin')
                            <div class="p-5 light">
                                <h5 class="font-weight-normal s-14">User</h5>
                                <span class="s-48 font-weight-lighter text-primary">{{count($user)}}</span>
                                <div> Admin
                                    <span class="text-primary">
                        <i class="icon icon-arrow-right"></i> {{\App\User::where('authority','=','admin')->count()}}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection