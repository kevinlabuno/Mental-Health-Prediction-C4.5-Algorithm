@extends('layouts.app')


@section('content')   @if(\App\Models\Node::count() > 0)
                            <div class="card-body">
                            <a href="{{ route('hapus.dataset') }}" class="btn btn-danger" onclick="return confirm ('Yaking Hapus Dataset?')">Hapus Dataset</a>
                            <a href="{{route('node1_1')}}" class="btn btn-warning">Hitung Hasil</a>
                            <button class="btn btn-success" onclick="toggleSection('section1')">Data <em>Training</em></button>
                            <button class="btn btn-success" onclick="toggleSection('section2')">Data <em>Testing</em></button>
                            </div>
                            @endif
                            @if (session('success'))
                            <div class="alert alert-primary">
                                {{session('success')}}
                            </div>
                            @endif
                              @if (session('hapus'))
                            <div class="alert alert-warning">
                                {{session('hapus')}}
                            </div>
                            @endif
<section id="section1">
                            <div class="card-body">
                                <h5 class="text-center"><b>Pratinjau Data <em>Training</em></b></h5>
                                <br>
                                <h6>Jumlah Data: {{$trainingCount}} Data <em>Training</em> ({{$t[0]->training}} %)</h6>
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
                                                @foreach ($trainingData as $item)
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
                        </div>    
 </section>  
<section id="section2">
                        <div class="card-body">
                                <h5 class="text-center"><b>Pratinjau Data <em>Testing</em></b></h5>
                                <br>
                                <h6>Jumlah Data: {{$testingCount}} Data <em>Testing</em> ({{$t[0]->testing}} %)</h6>
                                <br>
                                <div class="table-responsive">
                                        <table class="table text-center" id="table2">
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
                                                @foreach ($testingData as $item)
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
                        </div>
 </section>                       
  <script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
     $(document).ready(function () {
        $('#table2').DataTable();
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