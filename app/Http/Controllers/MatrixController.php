<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Auth;
use App\Models\Node;
use Illuminate\Support\Facades\DB;
use App\Models\Sampel;
use App\Models\Matrix;

class MatrixController extends Controller
{
    public function index(Request $request)
     { 
            $data = Matrix::all();
            $r1 = $data[0]->r1;
            $r2 = $data[0]->r2;
            $r3 = $data[0]->r3;
            $s1 = $data[0]->s1;
            $s2 = $data[0]->s2;
            $s3 = $data[0]->s3;
            $t1 = $data[0]->t1;
            $t2 = $data[0]->t2;
            $t3 = $data[0]->t3;

        $akurasi = ($r1 + $s2 + $t3 + $s3 + $t2) / ($r1 + $s2 + $t3 + $s3 + $t2 + $s1 + $t1 + $r2 + $r3) * 100;
        $presisi = ($r1 + $s2 + $t3) / ($s1 + $t1 + $r1 + $s2 + $t3) * 100;
        $recall = ($r1 + $s2 + $t3) / ($r2 + $r3 + $r1 + $s2 + $t3) * 100;
        return view('hasil.evaluasi',compact('data','akurasi','presisi','recall','r1','r2','r3','s1','s2','s3','t1','t2','t3'));
    }

    public function up(Request $request, $id)
        {
    $persen = $request->input('number');
    $total = Data::count();
    $banyak = intval(($persen / 100) * $total);
    $data = Data::take($banyak)->get();
    $r1 = $data->where('hasil', 'Rendah')->take($banyak);
    $s2 = $data->where('hasil', 'Sedang')->take($banyak);
    $t3 = $data->where('hasil', 'Tinggi')->take($banyak);

    $c1 = $r1->count('hasil');
    $c2 = $s2->count('hasil');
    $c3 = $t3->count('hasil');

    $matrixRecord = Matrix::find($id);
    $matrixRecord->update([
        'persen' => $persen,
        'banyak' => $banyak,
        'r1' => $c1,
        'r2' => 0,
        'r3' => 0,
        's1' => 0,
        's2' => $c2,
        's3' => 0,
        't1' => 0,
        't2' => 0,
        't3' => $c3,
    ]);

    return redirect()->back()->with('olah', 'Data Berhasil Dievaluasi');
}

    
}
