
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Klasifikasi Tingkat Kesadaran</title>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
  <script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- DataTables -->
  <style>
    .zc-body {
      background: #f9f9f9;
    }
 
    .chart--container {
      height: 100%;
      width: 100%;
      min-height: 950px;
    }
 
    .zc-ref {
      display: none;
    }

    #output {
            width: 100%;
            height: 500px; 
            font-family: 'Courier New', monospace; 
            white-space: pre-wrap; 
        }
        .indent {
            margin-left: 20px;
        }
  </style>
</head>

<body class="body-bg">
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="horizontal-main-wrapper">
      
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
                                
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Masuk<i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                     <a class="dropdown-item" href="{{ route('login.index') }}">Masuk</a>
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

        <div class="main-content-inner">
            <div class="container">
                   <div class="card-body">
                        <button class="btn btn-warning" onclick="toggleSection('section4')">Beranda</button>
                        <button class="btn btn-warning" onclick="toggleSection('section2')">Keterangan</button>
                        @if(\App\Models\Node::count() > 0)
                        <button class="btn btn-warning" onclick="toggleSection('section5')">Dataset</button>
                        <button class="btn btn-warning" onclick="toggleSection('section1')">Hasil Pohon Keputusan</button>
                        <button class="btn btn-warning" onclick="toggleSection('section6')"><em>Rules</em></button> 
                        @endif
                    </div>

 @if(\App\Models\Node::count() > 0)
<section id="section5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Pembagian Data <em>Training & Testing</em></b></h5>
                                <br>
                                <hr>
                                <br>
                                <h6 class="table text-center">Jumlah Data: {{$jumlah}} Data</h6>
                                <table class="table text-center">
                                <thead class="text-uppercase bg-primary">
                                  <tr class="text-white">
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Jumlah Data</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><em>Training</em></td>
                                        <td>{{$trainingCount}} Data ({{$t[0]->training}} %)</td>
                                    </tr>
                                    <tr>
                                        <td><em>Testing</em></td>
                                        <td>{{$testingCount}} Data ({{$t[0]->testing}} %)</td>
                                    </tr>
                                </tbody>
                                </table>
                                <hr>
                                <h6 class="text-center"><b>Data <em>Training</em> ({{$t[0]->training}} %)</b></h6>
                                <hr>
                                <div class="table-responsive">
                                        <table class="table text-center" id="training">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">p1</th>
                                                    <th scope="col">p2</th>
                                                    <th scope="col">p3</th>
                                                    <th scope="col">p4</th>
                                                    <th scope="col">p5</th>
                                                    <th scope="col">p6</th>
                                                    <th scope="col">p7</th>
                                                    <th scope="col">p8</th>
                                                    <th scope="col">p9</th>
                                                    <th scope="col">p10</th>
                                                    <th scope="col">p11</th>
                                                    <th scope="col">p12</th>
                                                    <th scope="col">p13</th>
                                                    <th scope="col">p14</th>
                                                    <th scope="col">p15</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($trainingData as $item)
                                                <tr>
                                                    <th scope="row">{{$no++}}</th>
                                                    <td>{{$item->p1}}</td>
                                                    <td>{{$item->p2}}</td>
                                                    <td>{{$item->p3}}</td>
                                                    <td>{{$item->p4}}</td>
                                                    <td>{{$item->p5}}</td>
                                                    <td>{{$item->p6}}</td>
                                                    <td>{{$item->p7}}</td>
                                                    <td>{{$item->p8}}</td>
                                                    <td>{{$item->p9}}</td>
                                                    <td>{{$item->p10}}</td>
                                                    <td>{{$item->p11}}</td>
                                                    <td>{{$item->p12}}</td>
                                                    <td>{{$item->p13}}</td>
                                                    <td>{{$item->p14}}</td>
                                                    <td>{{$item->p15}}</td>
                                                    <td>{{$item->total}}</td>
                                                    <td>{{$item->hasil}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
      <hr>
      <h6 class="text-center"><b>Data <em>Testing</em> ({{$t[0]->testing}} %)</b></h6>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table text-center" id="testing">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">p1</th>
                                                    <th scope="col">p2</th>
                                                    <th scope="col">p3</th>
                                                    <th scope="col">p4</th>
                                                    <th scope="col">p5</th>
                                                    <th scope="col">p6</th>
                                                    <th scope="col">p7</th>
                                                    <th scope="col">p8</th>
                                                    <th scope="col">p9</th>
                                                    <th scope="col">p10</th>
                                                    <th scope="col">p11</th>
                                                    <th scope="col">p12</th>
                                                    <th scope="col">p13</th>
                                                    <th scope="col">p14</th>
                                                    <th scope="col">p15</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($testingData as $item)
                                                <tr>
                                                    <th scope="row">{{$no++}}</th>
                                                    <td>{{$item->p1}}</td>
                                                    <td>{{$item->p2}}</td>
                                                    <td>{{$item->p3}}</td>
                                                    <td>{{$item->p4}}</td>
                                                    <td>{{$item->p5}}</td>
                                                    <td>{{$item->p6}}</td>
                                                    <td>{{$item->p7}}</td>
                                                    <td>{{$item->p8}}</td>
                                                    <td>{{$item->p9}}</td>
                                                    <td>{{$item->p10}}</td>
                                                    <td>{{$item->p11}}</td>
                                                    <td>{{$item->p12}}</td>
                                                    <td>{{$item->p13}}</td>
                                                    <td>{{$item->p14}}</td>
                                                    <td>{{$item->p15}}</td>
                                                    <td>{{$item->total}}</td>
                                                    <td>{{$item->hasil}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                
                            </div>
                        </div>
</section>
 @endif

<section id="section4">
    <div class="card-body">
    <h5>Beranda</h5>
                                <br>
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Kesehatan Mental</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Algoritma</a>
                                    </li>
                                    @if(\App\Models\Node::count() < 0)
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Dataset</a>
                                    </li>
                                    @endif
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <p>Kesehatan mental merupakan kondisi seseorang dalam hal psikologis, 
                                            emosional atau sosial yang sama pentingnya dengan kesehatan fisik karena jika kesehatan mental 
                                            terganggu maka kondisi fisik juga akan menurun. Kesehatan mental adalah salah hal yang penting 
                                            bagi seseorang karena mempengaruhi pandangan terhadap diri sendiri dan lingkungan sekitar serta
                                             mempengaruhi cara seseorang berpikir, merasa, bertindak bagaimana menangani stress, bersosialisasi 
                                             dan membuat pilihan. Kondisi kesehatan mental yang baik adalah ketika batin merasa tentram dan tenang, 
                                            sehingga memungkinkan untuk menikmati kehidupan sehari-hari dan lingkungan sekitar .</p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <p>C4.5 adalah algoritma yang luas digunakan untuk menghasilkan pohon keputusan, 
                                            khususnya dalam bidang pembelajaran mesin dan penambangan data. 
                                            Algoritma ini dikembangkan oleh Ross Quinlan dan merupakan perluasan dari algoritma ID3 
                                            (Iterative Dichotomiser 3) yang dikembangkan sebelumnya oleh Quinlan.
                                             C4.5 terkenal karena kemampuannya dalam menangani data kategorikal dan numerik, 
                                            menjadikannya algoritma yang serbaguna dalam berbagai domain.</p>
                                    </div>
                                    <body>

                                    @if(\App\Models\Node::count() < 0)
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <p></p>
                                        <form action="{{route('up.dataset')}}" enctype="multipart/form-data" method="POST">
                                            @csrf
                                        <div class="form-group">
                                            <label for="file" class="col-form-label">Masukan Dataset</label>
                                            <input class="form-control" type="file" id="file" name="file">
                                            <br>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>

                                        </form>
                                    </div>
                                    @endif
    </div>
</section>

<section id="section2">
    <div class="card-body">
    <div class="table-responsive">
        <h5 class="text-center"><b>Keterangan</b></h5>
        <br>
        <table class="table text-center" id="keterangan">
        <thead class="text-uppercase bg-primary">
             <tr class="text-white">
                <th>Variabel</th>
                <th>Nama</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               <td>P1</td>
               <td>Menjaga</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Mengerti</td>
               <td>Sangat Mengerti</td>
            </tr>

            <tr>
               <td>P2</td>
               <td>Informasi</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Sering</td>
               <td>Sangat Sering</td>
            </tr>

            <tr>
               <td>P3</td>
               <td>Waktu Merawat</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Sering</td>
               <td>Sangat Sering</td>
            </tr>

            <tr>
               <td>P4</td>
               <td>Aktivitas</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

            <tr>
               <td>P5</td>
               <td>Mengelola</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

            <tr>
               <td>P6</td>
               <td>Kesehatan Fisik</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

            <tr>
               <td>P7</td>
               <td>Istirahat</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

            <tr>
               <td>P8</td>
               <td>Tanda Awal</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

            <tr>
               <td>P9</td>
               <td>Jenis</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

            <tr>
               <td>P10</td>
               <td>Mengenai</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

            <tr>
               <td>P11</td>
               <td>Alokasi Waktu</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Sering</td>
               <td>Sangat Sering</td>
            </tr>

            <tr>
               <td>P12</td>
               <td>Pengaruh Produktivitas</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

            <tr>
               <td>P13</td>
               <td>Kelola Stres</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

            
            <tr>
               <td>P14</td>
               <td>Sikap</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

            
            <tr>
               <td>P15</td>
               <td>Dukungan</td>
               <td>Tidak</td>
               <td>Sedikit</td>
               <td>Cukup</td>
               <td>Tahu</td>
               <td>Sangat Tahu</td>
            </tr>

        </tbody>
       </table>
      </div>
    </div>
</section>
 @if(\App\Models\Node::count() > 0)
    <br>
<section id="section1">
    <div class="card-body">
        <h5 class="text-center"><b>Hasil Pohon Keputusan</b></h5>
        <div id="myChart" class="chart--container">
        <a href="https://www.zingchart.com/" rel="noopener" class="zc-ref"></a>
        </div>
    </div>
</section>

<section id="section6">
<div class="card-body">
    <div class="table-responsive">
        <h5 class="text-center"><b><em>Rules</em></b></h5>
        <br>
<textarea id="output" readonly>
--{{$a2->variabel}} : {{$a2->kategori}}
----{{$b21->variabel}} : {{$b21->kategori}}
----{{$b2->variabel}} : {{$b2->kategori}}
--------{{$c21->variabel}} : {{$c21->kategori}}
--------{{$c2->variabel}} : {{$c2->kategori}}
------------{{$d2->variabel}} : {{$d2->kategori}}
------------{{$d2->variabel}} : Sedikit
------------{{$d2->variabel}} : Cukup
------------{{$d2->variabel}} : Mengerti
------------{{$d2->variabel}} : Sangat Mengerti
--{{$a1->variabel}} : {{$a1->kategori}}
----{{$b11->variabel}} : {{$b11->kategori}}
----{{$b1->variabel}} : {{$b1->kategori}}
--------{{$c1->variabel}} : {{$c1->kategori}}
--------{{$c1->variabel}} : Sedikit
--------{{$c1->variabel}} : Cukup
--------{{$c1->variabel}} : Mengerti
--------{{$c1->variabel}} : Sangat Mengerti
    </textarea>
      </div>
</div>
</section>

<section id="section3">
    <div class="card-body">
                                <h5 class="text-center"><b>Pratinjau Dataset</b></h5>
                                <br>
                                <h6>Jumlah Data: {{$jumlah}} Data</h6>
                                <br>
                                <div class="table-responsive">
                                        <table class="table text-center" id="table">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No</th>
                                                    <th scope="col">NIM</th>
                                                    <th scope="col">Umur</th>
                                                    <th scope="col">p1</th>
                                                    <th scope="col">p2</th>
                                                    <th scope="col">p3</th>
                                                    <th scope="col">p4</th>
                                                    <th scope="col">p5</th>
                                                    <th scope="col">p6</th>
                                                    <th scope="col">p7</th>
                                                    <th scope="col">p8</th>
                                                    <th scope="col">p9</th>
                                                    <th scope="col">p10</th>
                                                    <th scope="col">p11</th>
                                                    <th scope="col">p12</th>
                                                    <th scope="col">p13</th>
                                                    <th scope="col">p14</th>
                                                    <th scope="col">p15</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($data as $item)
                                                <tr>
                                                    <th scope="row">{{$no++}}</th>
                                                    <td>{{$item->nim}}</td>
                                                    <td>{{$item->umur}}</td>
                                                    <td>{{$item->p1}}</td>
                                                    <td>{{$item->p2}}</td>
                                                    <td>{{$item->p3}}</td>
                                                    <td>{{$item->p4}}</td>
                                                    <td>{{$item->p5}}</td>
                                                    <td>{{$item->p6}}</td>
                                                    <td>{{$item->p7}}</td>
                                                    <td>{{$item->p8}}</td>
                                                    <td>{{$item->p9}}</td>
                                                    <td>{{$item->p10}}</td>
                                                    <td>{{$item->p11}}</td>
                                                    <td>{{$item->p12}}</td>
                                                    <td>{{$item->p13}}</td>
                                                    <td>{{$item->p14}}</td>
                                                    <td>{{$item->p15}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                  
    </div>
</section>
 @endif

            </div>
        </div>

    </div>
<script type="text/javascript" src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
    <script src="assets/js/scripts.js"></script>
<script>

    let p1 = @json($vp1);   
    let p1c1 = @json($vp1c1); 
    let p1c2 = @json($vp1c2); 

    let p2 = @json($vp2);   
    let p2c1 = @json($vp2c1); 
    let p2c2 = @json($vp2c2); 

    let p3 = @json($vp3);   
    let p3c1 = @json($vp3c1); 
    let p3c2 = @json($vp3c2); 

    let p4 = @json($vp5);   
    let p4c1 = @json($vp5c1); 
    let p4c2 = @json($vp5c2); 


    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"]; // full ZingChart schema can be found here: 
    let chartData = [{

        id: 'execdir',
        name:  p1,
        parent: '',
        cls: 'bblue'
      },
 
      {
        id: 'fkn1',
        fake: true,
        name: '5',
        parent: ''
      },
 

      {
        id: 'dirtran',
        name: p1c1,
        parent: 'execdir',
        cls: 'bgreen'
      },
      {
        id: 'dirtan1',
        name: p1c2,
        parent: 'execdir',
        cls: 'bgreen'
      },

       {
        id: 'fkn2',
        fake: true,
        name: '5',
        parent: 'dirtan1'
      },
      
         {
        id: 'red1',
        name: p2,
        parent: 'dirtran',
        cls: 'bblue'
      },
        {
        id: 'red2',
        name: p4,
        parent: 'fkn2',
        cls: 'bblue'
      },

       {
        id: 'blue3',
        name: p4c1,
        parent: 'red2',
        cls: 'bgreen'
      },
       {
        id: 'blue4',
        name: p4c2,
        parent: 'red2',
        cls: 'bgreen'
      },
      
         

       {
        id: 'blue1',
        name: p2c1,
        parent: 'red1',
        cls: 'bgreen'
      },
       {
        id: 'blue2',
        name: p2c2,
        parent: 'red1',
        cls: 'bgreen'
      },

          {
        id: 'orange1',
        name: p3,
        parent: 'blue1',
        cls: 'bblue'
      },

        {
        id: 'orange2',
        name: p3c1,
        parent: 'orange1',
        cls: 'bgreen'
      },
       {
        id: 'raonge3',
        name: p3c2,
        parent: 'orange1',
        cls: 'bgreen'
      },
      

    ];
 
    let chartConfig = {
    type: 'tree',
    backgroundColor: '#f9f9f9',
    options: {
    aspect: 'tree-down',
    orgChart: true,
    packingFactor: 1,
    link: {
      lineColor: '#000'
    },
    'link[parent-911sm]': {
      aspect: 'side-before'
    },
    'link[parent-911gism]': {
      aspect: 'side-before'
    },
    'link[parent-dirpr]': {
      aspect: 'side-before'
    },
    node: {
      height: '65px',
      borderColor: '#333333',
      borderWidth: '1px',
      shadow: true,
      shadowAlpha: 0.5,
      shadowDistance: '2px',
      label: {
        color: '#fff',
        fontSize: '10px'
      },
      hoverState: {
        visible: false
      },
      tooltip: {
        text: '<b>%text</b><br>%data-title'
      }
    },
    'node[cls-rshifted]': {
      offsetX: '25px'
    },
    'node[cls-lshifted]': {
      offsetX: '-25px'
    },
    'node[cls-bblack]': {
      backgroundColor: '#000',
      width: '120px'
    },
    'node[cls-borange]': {
      backgroundColor: '#F6931D',
      width: '80px'
    },
    'node[cls-bred]': {
      backgroundColor: '#C00000',
      width: '80px'
    },
    'node[cls-blightblue]': {
      backgroundColor: '#00B9C2',
      width: '80px'
    },
    'node[cls-bblue]': {
      backgroundColor: '#00408F',
      width: '80px'
    },
    'node[cls-bgreen]': {
      backgroundColor: '#70AD47',
      width: '80px'
    }
    },
    plotarea: {
    margin: '10px auto' // Menempatkan chart di tengah
    },
    series: chartData
    };
 
    zingchart.render({
      id: 'myChart',
      width: '100%',
      height: '100%',
      data: chartConfig
    });
</script>

<script>
      $('#sampel').DataTable();
        $('#sampel1_1').DataTable();
        $('#training').DataTable();
        $('#testing').DataTable();
        $('#sampel1_2').DataTable();
        $('#sampel1_3').DataTable();
        $('#sampel2_1').DataTable();
        $('#sampel2_2').DataTable();
    $(document).ready(function () {
        $('section:not(#section4)').hide();
    });

    function toggleSection(sectionId) {
        $('section').hide();
        $('#' + sectionId).show();
    }
</script>

          <script>
    $(document).ready( function () {
    $('#keterangan').DataTable();
    });
    </script>

    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="assets/js/line-chart.js"></script>
    <script src="assets/js/pie-chart.js"></script>
    <script src="assets/js/bar-chart.js"></script>
    <script src="assets/js/maps.js"></script>
    <script src="assets/js/plugins.js"></script>

  
</body>

</html>
