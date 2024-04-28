@extends('layouts.app')
  <script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>
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

 
@section('content')
<div class="card-body">
<button class="btn btn-warning" onclick="toggleSection('section2')">Keterangan</button>
<button class="btn btn-warning" onclick="toggleSection('section3')"><em>Rules</em></button>
<button class="btn btn-warning" onclick="toggleSection('section1')">Hasil Pohon Keputusan</button>
</div>
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
<section id="section3">
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
    <br>
<section id="section1">
<div class="card-body">
        <h5 class="text-center"><b>Hasil Pohon Keputusan</b></h5>
        <div id="myChart" class="chart--container">
        <a href="https://www.zingchart.com/" rel="noopener" class="zc-ref"></a>
        </div>
</div>
</section>


</div>

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
    $(document).ready(function () {
        $('#keterangan').DataTable();
    });
    $(document).ready(function () {
        $('section:not(#section1)').hide();
    });

    function toggleSection(sectionId) {
        $('section').hide();
        $('#' + sectionId).show();
    }
</script>
@endsection