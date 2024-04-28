<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Data;
use Illuminate\Support\Facades\DB;
use App\Models\Sampel;
use App\Models\Node;
use App\Models\Persen;

class LoginController extends Controller
{
     public function login(Request $request)
      {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/beranda'); 
        } else {
            return redirect()->back()->with('error', 'Nama pengguna atau kata sandi salah');
        }
    }
    
     public function logout()
      {
        Auth::logout();
        return redirect('/');
    }

    public function user(){

        $persen = Persen::latest()->first();
        $trainingPercentage = $persen->training;

        $totalData = Data::count();
        $trainingCount = round(($trainingPercentage / 100) * $totalData);
        $testingCount = $totalData - $trainingCount;
        $trainingData = Data::take($trainingCount)->get();
        $testingData = Data::skip($trainingCount)->take($testingCount)->get();

        $t = Persen::all();

         $data = Data::all();
        $jumlah = Data::count('id');

         $parents = Sampel::where('ket', 'Sampel 1')->get(); 
        $parents2 = Sampel::where('ket', 'Sampel 1.2')->get();
        $parents3 = Sampel::where('ket', 'Sampel 1.3')->get(); 
        $parents4 = Sampel::where('ket', 'Sampel 2.1')->get(); 
        $parents5 = Sampel::where('ket', 'Sampel 2.2')->get(); 

        $p1 = $this->getCommonColumns($parents);
        $p1c1 = $this->getCommonColumnValues($parents, $p1);
        $p1c2 = array_map(function ($value) {
        return $value + 1;
        }, $p1c1);

        $p2 = $this->getCommonColumns($parents2);
        $p2c1 = $this->getCommonColumnValues($parents2, $p2);
        $p2c2 = array_map(function ($value) {
        return $value + 1;
        }, $p2c1);

        $p3 = $this->getCommonColumns($parents3);
        $p3c1 = $this->getCommonColumnValues($parents3, $p3);
        $p3c2 = array_map(function ($value) {
        return $value + 1;
        }, $p3c1);

        $p5 = $this->getCommonColumns($parents5);
        $p5c1 = $this->getCommonColumnValues($parents5, $p5);
        $p5c2 = array_map(function ($value) {
        return $value + 1;
        }, $p5c1);

        $vp1 = array_values($p1);
        $vp1c1 = array_values($p1c1);
        $vp1c2 = array_values($p1c2);

        $vp2 = array_values($p2);
        $vp2c1 = array_values($p2c1);
        $vp2c2 = array_values($p2c2);

        $vp3 = array_values($p3);
        $vp3c1 = array_values($p3c1);
        $vp3c2 = array_values($p3c2);

        $vp5 = array_values($p5);
        $vp5c1 = array_values($p5c1);
        $vp5c2 = array_values($p5c2);

        $dataawal = Data::all();
        $tinggi = Data::where('hasil','Tinggi')->count();
        $sedang = Data::where('hasil','Sedang')->count();
        $rendah = Data::where('hasil','Rendah')->count();
        $jumlah = Data::count();

          $a1 = Node::where('ket', 'node 1')
            ->where('rank', 1)
            ->orderByDesc('entropy')
            ->first();

        $a2 = Node::where('ket', 'node 1')
            ->where('rank', 1)
            ->orderByDesc('entropy')
            ->skip(1)
            ->first();
        
        $b2 = Node::where('ket', 'node 1.1')
            ->where('rank', 1)
            ->orderByDesc('entropy')
            ->skip(1)
            ->first();

         $b21 = Node::where('ket', 'node 1.1')
            ->where('rank', 1)
            ->orderByDesc('entropy')
            ->first();
        
        $c2 = Node::where('ket', 'node 1.2')
            ->where('rank', 1)
            ->orderByDesc('entropy')
            ->skip(1)
            ->first();

         $c21 = Node::where('ket', 'node 1.2')
            ->where('rank', 1)
            ->orderByDesc('entropy')
            ->first();
        
         $d2 = Node::where('ket', 'node 1.3')
            ->where('rank', 1)
            ->orderByDesc('entropy')
            ->first();
        
        $b1 = Node::where('ket', 'node 2.1')
            ->where('rank', 1)
            ->orderByDesc('entropy')
            ->skip(1)
            ->first();

         $b11 = Node::where('ket', 'node 2.1')
            ->where('rank', 1)
            ->orderByDesc('entropy')
            ->first();
        
        $c1 = Node::where('ket', 'node 2.2')
            ->where('rank', 1)
            ->orderByDesc('entropy')
            ->first();

        return view('user', compact('a1','a2','b2','b21','c2','c21','b1','b11','c1','d2','trainingData','testingData','trainingCount','testingCount','t','dataawal','tinggi','sedang','rendah','jumlah','data','jumlah','vp1', 'vp1c1','vp1c2', 'vp2', 'vp2c1','vp2c2','vp3', 'vp3c1', 'vp3c2',  'vp5', 'vp5c1','vp5c2')); 
    }

      private function getCommonColumns($sampleData)
        {
        $commonColumns = [];
        $firstSample = $sampleData->first();
        if ($firstSample) {
        foreach ($firstSample->getAttributes() as $column => $value) {
            $columnName = strtoupper(explode('.', $column)[1] ?? $column);

            if (preg_match('/^P[1-9]|1[0-5]$/', $columnName) &&
                !in_array($columnName, $commonColumns) &&
                $sampleData->where($column, $value)->count() === $sampleData->count()) {
                $commonColumns[] = $columnName;
            }
                }
        }   
        if (count($commonColumns) > 1) {
        $commonColumns = [end($commonColumns)];
     }

        return $commonColumns;
    }

    private function getCommonColumnValues($sampleData, $commonColumns)
      {
        $firstSample = $sampleData->first();
        $s1Value = [];

        foreach ($commonColumns as $columnName) {
        $columnNameLower = strtolower($columnName);
        $columnValue = $firstSample->{$columnNameLower}; 
        $s1Value[$columnNameLower] = $columnValue;
        }
        return $s1Value;
    }
   
    public function coba(){
        return view('coba');
    }
}
