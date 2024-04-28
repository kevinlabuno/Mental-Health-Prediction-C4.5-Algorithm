@extends('layouts.app')

@section('content')
    
          <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                        </div>
                                @endif
                                <h5>Beranda</h5>
                                <br>
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Kesehatan Mental</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Algoritma</a>
                                    </li>
                                    @if(\App\Models\Node::count() == 0)
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
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <p></p>
                                        <form action="{{route('up.dataset')}}" enctype="multipart/form-data" method="POST">
                                            @csrf
                                           <div class="form-group">
                                                <label for="number" class="col-form-label">Pembagian Training & Testing %</label>
                                                <select class="form-control" name="number" id="number" required>
                                                <option class="form-control" value="70">70/30 %</option>
                                                <option class="form-control" value="80">80/20 %</option>
                                                <option class="form-control" value="90">90/10 %</option>
                                                </select>
                                           </div>
                                        <div class="form-group">
                                            <label for="file" class="col-form-label">Masukan Dataset</label>
                                            <input class="form-control" type="file" id="file" name="file">
                                            <br>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
     
@endsection