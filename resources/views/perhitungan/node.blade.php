@extends('layouts.app')


@section('content')
    


        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4>Node 1</h4>
                    <br>
                     <div class="table-responsive">
                                        <table class="table text-center" id="table">
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
                                                @foreach ($node1 as $item)
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
        </div>     
                        
@endsection