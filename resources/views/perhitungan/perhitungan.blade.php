@extends('layouts.app')


@section('content')
       <div class="card-body">
         
        @if (session('message'))
        <div class="alert alert-primary">
          {{session('message')}}
        </div>
        @endif
                <button class="btn btn-success" onclick="toggleSection('section0')">Pembagian Dataset</button>
                <button class="btn btn-warning" onclick="toggleSection('section1')">Sampel Awal</button>
                <button class="btn btn-warning" onclick="toggleSection('section2')">Node 1</button>
                <button class="btn btn-warning" onclick="toggleSection('section3')">Sampel 1.1</button>
                <button class="btn btn-warning" onclick="toggleSection('section4')">Node  1.1</button>
                <button class="btn btn-warning" onclick="toggleSection('section5')">Sampel  1.2</button>
                <button class="btn btn-warning" onclick="toggleSection('section6')">Node  1.2</button>
                <button class="btn btn-warning" onclick="toggleSection('section7')">Sampel  1.3</button>
                <button class="btn btn-warning" onclick="toggleSection('section8')">Node  1.3</button>
                <button class="btn btn-warning" onclick="toggleSection('section9')">Sampel  2.1</button>
                <button class="btn btn-warning" onclick="toggleSection('section10')">Node  2.1</button>
                <button class="btn btn-warning" onclick="toggleSection('section11')">Sampel  2.2</button>
                <button class="btn btn-warning" onclick="toggleSection('section12')">Node  2.2</button>

              </div>   

                   <section id="section0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Pembagian Data <em>Training & Testing</em></b></h5>
                                <br>
                                <hr>
                                <br>
                                <h6 class="table text-center">Total Data: {{$jumlah}} Data</h6>
                                <table class="table text-center">
                                <thead class="text-uppercase bg-primary">
                                  <tr class="text-white">
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Jumlah Data</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Data <em>Training</em></td>
                                        <td>{{$trainingCount}} Data ({{$t[0]->training}} %)</td>
                                    </tr>
                                    <tr>
                                        <td>Data Testing</td>
                                        <td>{{$testingCount}} Data ({{$t[0]->testing}} %)</td>
                                    </tr>
                                </tbody>
                                </table>
                                <hr>
                                <h6 class="table text-center">Data <em>Training</em> ({{$t[0]->training}} %) </h6>
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
                                    <h6 class="table text-center">Data <em>Testing</em> ({{$t[0]->testing}} %)</h6>
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

                 {{-- ------------------------------SAMPEL AWAL----------------------------------------- --}}
                    <section id="section1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Pembagian Sampel</b></h5>
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
                                        <td>Tinggi</td>
                                        <td>{{$tinggi}} Data</td>
                                    </tr>
                                    <tr>
                                        <td>Sedang</td>
                                        <td>{{$sedang}} Data</td>
                                    </tr>
                                     <tr>
                                        <td>Rendah</td>
                                        <td>{{$rendah}} Data</td>
                                    </tr>
                                </tbody>
                                </table>
                                <div class="table-responsive">
                                        <table class="table text-center" id="sampel">
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
                                                @foreach ($dataawal as $item)
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

                 {{-- ------------------------------NODE 1---------------------------------------------- --}}
                    <section id="section2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Node 1</b></h5>
                                <br>
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
                    </section>

                {{-- ------------------------------SAMPEL 1.1------------------------------------------- --}}
                     <section id="section3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Sampel 1.1</b></h5>
                                <br>
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
                                        <table class="table text-center" id="sampel1_1">
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
                                                @foreach ($sampel1 as $item)
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

                {{-- ------------------------------NODE 1.1------------------------------------------- --}}    
                     <section id="section4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Node 1.1</b></h5>
                                <br>
                                <h6>Data diurutkan berdasarkan Rank</h6>
                                <br>
                                <div class="table-responsive">
                                        <table class="table text-center" id="node1_1">
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
                
                {{-- ------------------------------SAMPEL 1.2------------------------------------------- --}}
                     <section id="section5">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Sampel 1.2</b></h5>
                                <br>
                                <hr>
                                <h6 class="text-center">Jumlah Data <b>(Sampel 1.2)</b> = {{$jumlahsampel1_2}} Data</h6>
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
                                        <td>{{$tinggiS1_2}} Data</td>
                                    </tr>
                                    <tr>
                                        <td>Sedang</td>
                                        <td>{{$sedangS1_2}} Data</td>
                                    </tr>
                                     <tr>
                                        <td>Rendah</td>
                                        <td>{{$rendahS1_2}} Data</td>
                                    </tr>
                                </tbody>
                                </table>
                                <div class="table-responsive">
                                        <table class="table text-center" id="sampel1_2">
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
                                                @foreach ($sampel1_2 as $item)
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
                
                {{-- ------------------------------NODE 1.2------------------------------------------- --}}    
                     <section id="section6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Node 1.2</b></h5>
                                <br>
                                <h6>Data diurutkan berdasarkan Rank</h6>
                                <br>
                                <div class="table-responsive">
                                        <table class="table text-center" id="node1_2">
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
                                                @foreach ($node1_2 as $item)
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

                {{-- ------------------------------SAMPEL 1.3------------------------------------------- --}}
                     <section id="section7">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Sampel 1.3</b></h5>
                                <br>
                                <hr>
                                <h6 class="text-center">Jumlah Data <b>(Sampel 1.3)</b> = {{$jumlahsampel1_3}} Data</h6>
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
                                        <td>{{$tinggiS1_3}} Data</td>
                                    </tr>
                                    <tr>
                                        <td>Sedang</td>
                                        <td>{{$sedangS1_3}} Data</td>
                                    </tr>
                                     <tr>
                                        <td>Rendah</td>
                                        <td>{{$rendahS1_3}} Data</td>
                                    </tr>
                                </tbody>
                                </table>
                                <div class="table-responsive">
                                        <table class="table text-center" id="sampel1_3">
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
                                                @foreach ($sampel1_3 as $item)
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

                {{-- ------------------------------NODE 1.3------------------------------------------- --}}    
                     <section id="section8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Node 1.3</b></h5>
                                <br>
                                <h6>Data diurutkan berdasarkan Rank</h6>
                                <br>
                                <div class="table-responsive">
                                        <table class="table text-center" id="node1_3">
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
                                                @foreach ($node1_3 as $item)
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

                {{-- ------------------------------SAMPEL 2.1------------------------------------------- --}}
                     <section id="section9">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Sampel 2.1</b></h5>
                                <br>
                                <hr>
                                <h6 class="text-center">Jumlah Data <b>(Sampel 2.1)</b> = {{$jumlahsampel2_1}} Data</h6>
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
                                        <td>{{$tinggiS2_1}} Data</td>
                                    </tr>
                                    <tr>
                                        <td>Sedang</td>
                                        <td>{{$sedangS2_1}} Data</td>
                                    </tr>
                                     <tr>
                                        <td>Rendah</td>
                                        <td>{{$rendahS2_1}} Data</td>
                                    </tr>
                                </tbody>
                                </table>
                                <div class="table-responsive">
                                        <table class="table text-center" id="sampel2_1">
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
                                                @foreach ($sampel2_1 as $item)
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

                {{-- ------------------------------NODE 2.1------------------------------------------- --}}    
                     <section id="section10">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Node 2.1</b></h5>
                                <br>
                                <h6>Data diurutkan berdasarkan Rank</h6>
                                <br>
                                <div class="table-responsive">
                                        <table class="table text-center" id="node2_1">
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
                                                @foreach ($node2_1 as $item)
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

                {{-- ------------------------------SAMPEL 2.2------------------------------------------- --}}
                     <section id="section11">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Sampel 2.2</b></h5>
                                <br>
                                <hr>
                                <h6 class="text-center">Jumlah Data <b>(Sampel 2.2)</b> = {{$jumlahsampel2_2}} Data</h6>
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
                                        <td>{{$tinggiS2_2}} Data</td>
                                    </tr>
                                    <tr>
                                        <td>Sedang</td>
                                        <td>{{$sedangS2_2}} Data</td>
                                    </tr>
                                     <tr>
                                        <td>Rendah</td>
                                        <td>{{$rendahS2_2}} Data</td>
                                    </tr>
                                </tbody>
                                </table>
                                <div class="table-responsive">
                                        <table class="table text-center" id="sampel2_2">
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
                                                @foreach ($sampel2_2 as $item)
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

                  {{-- ------------------------------NODE 2.1------------------------------------------- --}}    
                     <section id="section12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-center"><b>Node 2.2</b></h5>
                                <br>
                                <h6>Data diurutkan berdasarkan Rank</h6>
                                <br>
                                <div class="table-responsive">
                                        <table class="table text-center" id="node2_2">
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
                                                @foreach ($node2_2 as $item)
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
                

    
                      
<script>
    $(document).ready(function () {
        $('#sampel').DataTable();
        $('#sampel1_1').DataTable();
        $('#training').DataTable();
        $('#testing').DataTable();
        $('#sampel1_2').DataTable();
        $('#sampel1_3').DataTable();
        $('#sampel2_1').DataTable();
        $('#sampel2_2').DataTable();
        $('#node1').DataTable({
            "order": [[8, 'asc']],
        });
         $('#node1_1').DataTable({
            "order": [[8, 'asc']],
        });
        $('#node1_2').DataTable({
            "order": [[8, 'asc']],
        });
         $('#node1_3').DataTable({
            "order": [[8, 'asc']],
        });
         $('#node2_1').DataTable({
            "order": [[8, 'asc']],
        });
        $('#node2_2').DataTable({
            "order": [[8, 'asc']],
        });
    });
    $(document).ready(function () {
        $('section:not(#section0)').hide();
    });

    function toggleSection(sectionId) {
        $('section').hide();
        $('#' + sectionId).show();
    }
</script>
@endsection