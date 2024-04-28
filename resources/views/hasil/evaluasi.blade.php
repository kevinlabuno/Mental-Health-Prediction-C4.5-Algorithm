@extends('layouts.app')

@section('content')
 @if (session('olah'))
                            <div class="alert alert-primary">
                                {{session('olah')}}
                            </div>
                            @endif
  <div class="card-body">
      <form action="{{ route('matrix.up', ['id' => $data[0]->id]) }}" method="POST">
            @csrf
        <div class="form-group">
            <label for="number" class="col-form-label">Pembagian Evaluasi Data %</label>
            <select class="form-control" name="number" id="number">
                <option class="form-control" value="70">Pilih Persentase</option>
                 <option class="form-control" value="70">70/30 %</option>
                 <option class="form-control" value="80">80/20 %</option>
                 <option class="form-control" value="90">90/10 %</option>
            </select>
            <br>
            <button type="submit" class="btn btn-primary">Olah</button>
        </div>
    </form>
  </div>

  <div class="card-body">
    
    <div class="row">
         <div class="table-responsive col-md-2">
    <h6>Keterangan</h6>
    @if ($data[0]->persen=='70')
        <p><b>Persentase = </b>70/30 %</p>
    @elseif($data[0]->persen=='80')
        <p><b>Persentase = </b>80/20 %</p>
    @else
        <p><b>Persentase = </b>90/10 %</p>
    @endif
    <p><b>Banyak =</b> {{$data[0]->banyak}} Data</p>
    </div>
    <div class="table-responsive col-md-3">
    <h6>Rumus</h6>
    <p><b>Akurasi :</b> TP+TN / TP+TN+FP+FN x 100%</p>
    <p><b>Presisi :</b> TP / FP+TP x 100%</p>
    <p><b>Recall :</b> TP/FN +TP x 100%</p>
    </div>

    <div class="table-responsive col-md-7">
    <p><b>True Positive (TP):</b> Jumlah sampel yang benar-benar termasuk dalam kelas yang benar.</p>
    <p><b>False Negative (FN):</b> Jumlah sampel yang seharusnya termasuk dalam kelas yang benar, tetapi model mengklasifikasikannya sebagai kelas lain.</p>
    <p><b>False Positive (FP):</b> Jumlah sampel yang seharusnya termasuk dalam kelas lain, tetapi model mengklasifikasikannya sebagai kelas ini.</p>
    <p><b>True Negative (TN):</b> Jumlah sampel yang benar-benar termasuk dalam kelas lain.</p>
    </div>
    </div>
  </div>

    <div class="card-body">
    <div class="row">
        <div class="table-responsive col-md-6">
            <h5 class="text-center"><b><em>Confusion Matrix </em></b></h5>
            <br>
            <table class="table text-center" id="keterangan">
                <thead class="text-uppercase bg-primary">
                    <tr class="text-white">
                        <th></th>
                        <th>RENDAH</th>
                        <th>SEDANG</th>
                        <th>TINGGI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>RENDAH</td>
                        <td>TP</td>
                        <td>FN</td>
                        <td>FN</td>
                    </tr>
                    <tr>
                        <td>SEDANG</td>
                        <td>FP</td>
                        <td>TP</td>
                        <td>TN</td>
                    </tr>
                    <tr>
                        <td>TINGGI</td>
                        <td>FP</td>
                        <td>TN</td>
                        <td>TP</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tabel Kedua -->
        <div class="table-responsive col-md-6">
            <h5 class="text-center"><b><em>Confusion Matrix </em></b></h5>
            <br>
            <table class="table text-center" id="keterangan">
                <thead class="text-uppercase bg-primary">
                    <tr class="text-white">
                        <th></th>
                        <th>Rendah</th>
                        <th>Sedang</th>
                        <th>Tinggi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>RENDAH</td>
                        <td>{{$r1}}</td>
                        <td>{{$r2}}</td>
                        <td>{{$r3}}</td>
                    </tr>
                    <tr>
                        <td>SEDANG</td>
                        <td>{{$s1}}</td>
                        <td>{{$s2}}</td>
                        <td>{{$s3}}</td>
                    </tr>
                    <tr>
                        <td>TINGGI</td>
                        <td>{{$t1}}</td>
                        <td>{{$t2}}</td>
                        <td>{{$t3}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
       <div class="table-responsive">
            <h5 class="text-center"><b>Hasil</b></h5>
            <br>
            <table class="table text-center" id="keterangan">
                <thead class="text-uppercase bg-primary">
                    <tr class="text-white">
                        <th>Akurasi</th>
                        <th>Presisi</th>
                        <th>Recall</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$akurasi}} %</td>
                        <td>{{$presisi}} %</td>
                        <td>{{$recall}} %</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection