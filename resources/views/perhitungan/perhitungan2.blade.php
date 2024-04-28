@extends('layouts.app')


@section('content')
    
        <div class="col-lg-12 mt-5">
            <div class="card-body">
             <a href="{{route('perhitungan')}}" class="btn btn-primary">Sampel Awal</a>
              <a href="{{route('perhitungan2')}}" class="btn btn-primary">Sampel 1.1</a>
                </div>    

                <section id="section1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Sampel 1.1</b></h5>
                                <br>
                                <button class="btn btn-warning" onclick="toggleSection('section1')">Sampel 1.1</button>
                                <button class="btn btn-warning" onclick="toggleSection('section2')">Node 1.1</button>
                                {{-- <button class="btn btn-warning" onclick="toggleSection('section3')">Sampel 1.1</button> --}}
                                <hr>
                                <h6 class="text-center">Jumlah Data <b>(Sampel 1.1)</b> = {{$jumlahsampel1}} Data</h6>
                                <br>
                                <br>
                                <table class="table text-center">
                                <thead class="text-uppercase bg-primary">
                                  <tr class="text-white">
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Jumlah Data</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tinggi</td>
                                        <td>{{$tinggiS1}} Data</td>
                                    </tr>
                                    <tr>
                                        <td>Sedang</td>
                                        <td>{{$sedangS1}} Data</td>
                                    </tr>
                                     <tr>
                                        <td>Rendah</td>
                                        <td>{{$rendahS1}} Data</td>
                                    </tr>
                                </tbody>
                                </table>
                                <div class="table-responsive">
                                        <table class="table text-center" id="sampel1">
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
                                                @foreach ($data as $item)
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

                <section id="section2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Node 1.1</b></h5>
                                <br>
                                <button class="btn btn-warning" onclick="toggleSection('section1')">Sampel 1.1</button>
                                <button class="btn btn-warning" onclick="toggleSection('section2')">Node 1.1</button>
                                <hr>
                                <h6>Data diurutkan berdasarkan Rank</h6>
                                <br>
                                <div class="table-responsive">
                                        <table class="table text-center" id="node1">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">variabel</th>
                                                    <th scope="col">Kategori</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Rendah</th>
                                                    <th scope="col">Sedang</th>
                                                    <th scope="col">Tinggi</th>
                                                    <th scope="col">Entropy</th>
                                                    <th scope="col">Gain</th>
                                                    <th scope="col">Rank</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($node1_1 as $item)
                                                <tr>
                                                    <td>{{$item->variabel}}</td>
                                                    <td>{{$item->kategori}}</td>
                                                    <td>{{$item->jumlah}}</td>
                                                    <td>{{$item->rendah}}</td>
                                                    <td>{{$item->sedang}}</td>
                                                    <td>{{$item->tinggi}}</td>
                                                    <td>{{$item->entropy}}</td>
                                                    <td>{{$item->gain}}</td>
                                                    <td>{{$item->rank}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                </section>



        </div>     
                      
<script>
    $(document).ready(function () {
        $('#sampel').DataTable();
        $('#sampel1').DataTable();
        $('#node1.1').DataTable({
            "order": [[8, 'asc']],
        });
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