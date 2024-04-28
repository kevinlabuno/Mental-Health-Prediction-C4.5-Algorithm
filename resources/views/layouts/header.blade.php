<div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <h5>Klasifikasi Tingkat Kesadaran Kesehatan Mental</h5>
                        </div>
                    </div>
                    
                    <div class="col-md-9 clearfix text-right">
                        <div class="d-md-inline-block d-block mr-md-4">
                        </div>
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0">
                                <img class="avatar user-thumb" src="assets/user.png" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Auth::user()->nama}}<i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                     <a class="dropdown-item" href="{{ route('logout') }}">Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <li>
                                        <a href="{{route('beranda')}}"><i class="ti-dashboard"></i>Beranda</a>
                                    </li>
                                    @if(\App\Models\Node::count() > 0)
                                    <li>
                                        <a href="{{route('priview')}}"><i class="ti-pie-chart"></i>Pratinjau Dataset</a>
                                    </li>
                                    <li class="mega-menu">
                                        <a href="{{ route('perhitungan') }}"><i class="ti-palette"></i>Perhitungan</a>
                                    </li>
                                    @endif
                                    @if(\App\Models\Node::count() > 0)
                                    <li class="mega-menu">
                                        <a href="{{ route('hasil') }}"><i class="ti-harddrives"></i>Hasil</a>
                                    </li>
                                    @endif
                                     @if(\App\Models\Node::count() > 0)
                                    <li class="mega-menu">
                                        <a href="{{ route('matrix') }}"><i class="ti-desktop"></i>Evaluasi</a>
                                    </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>