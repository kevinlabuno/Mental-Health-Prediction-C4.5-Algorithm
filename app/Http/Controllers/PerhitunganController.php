<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Node;
use Illuminate\Support\Facades\DB;
use App\Models\Sampel;
use App\Models\Matrix;
use App\Models\Persen;

class PerhitunganController extends Controller
{
     // ------------------------PEMBAGIAN SAMPEL------------------------------------------------
    public function index(){
        $dataawal = Data::all();


        $tinggi = Data::where('hasil','Tinggi')->count();
        $sedang = Data::where('hasil','Sedang')->count();
        $rendah = Data::where('hasil','Rendah')->count();
        $jumlah = Data::count();
        $node1 = Node::where('ket','node 1')->get();

        // -------------------------SAMPEL 1.1 & NODE 1.1---------------------------------------
        $sampel1 = Sampel::where('ket','Sampel 1')->get();
        $jumlahsampel1 = Sampel::where('ket','Sampel 1')->count('id');
        $tinggiS1 = Sampel::where('ket','Sampel 1')->where('hasil','Tinggi')->count();
        $sedangS1 = Sampel::where('ket','Sampel 1')->where('hasil','Sedang')->count();
        $rendahS1 = Sampel::where('ket','Sampel 1')->where('hasil','Rendah')->count();
        $node1_1 = Node::where('ket','node 1.1')->get();

        // -------------------------SAMPEL 1.2 & NODE 1.2----------------------------------------
        $sampel1_2 = Sampel::where('ket','Sampel 1.2')->get();
        $jumlahsampel1_2 = Sampel::where('ket','Sampel 1.2')->count('id');
        $tinggiS1_2 = Sampel::where('ket','Sampel 1.2')->where('hasil','Tinggi')->count();
        $sedangS1_2 = Sampel::where('ket','Sampel 1.2')->where('hasil','Sedang')->count();
        $rendahS1_2 = Sampel::where('ket','Sampel 1.2')->where('hasil','Rendah')->count();
        $node1_2 = Node::where('ket','node 1.2')->get();

            // -------------------------SAMPEL 1.3 & NODE 1.3------------------------------------
        $sampel1_3 = Sampel::where('ket','Sampel 1.3')->get();
        $jumlahsampel1_3 = Sampel::where('ket','Sampel 1.3')->count('id');
        $tinggiS1_3 = Sampel::where('ket','Sampel 1.3')->where('hasil','Tinggi')->count();
        $sedangS1_3 = Sampel::where('ket','Sampel 1.3')->where('hasil','Sedang')->count();
        $rendahS1_3 = Sampel::where('ket','Sampel 1.3')->where('hasil','Rendah')->count();
        $node1_3 = Node::where('ket','node 1.3')->get();

         // -------------------------SAMPEL 2.1 & NODE 2.1------------------------------------
        $sampel2_1 = Sampel::where('ket','Sampel 2.1')->get();
        $jumlahsampel2_1 = Sampel::where('ket','Sampel 2.1')->count('id');
        $tinggiS2_1 = Sampel::where('ket','Sampel 2.1')->where('hasil','Tinggi')->count();
        $sedangS2_1 = Sampel::where('ket','Sampel 2.1')->where('hasil','Sedang')->count();
        $rendahS2_1 = Sampel::where('ket','Sampel 2.1')->where('hasil','Rendah')->count();
        $node2_1 = Node::where('ket','node 2.1')->get();

        // -------------------------SAMPEL 2.2 ------------------------------------
        $sampel2_2 = Sampel::where('ket','Sampel 2.2')->get();
        $jumlahsampel2_2 = Sampel::where('ket','Sampel 2.2')->count('id');
        $tinggiS2_2 = Sampel::where('ket','Sampel 2.2')->where('hasil','Tinggi')->count();
        $sedangS2_2 = Sampel::where('ket','Sampel 2.2')->where('hasil','Sedang')->count();
        $rendahS2_2 = Sampel::where('ket','Sampel 2.2')->where('hasil','Rendah')->count();
        $node2_2 = Node::where('ket','node 2.2')->get();


        $persen = Persen::latest()->first();
        $trainingPercentage = $persen->training;

        $totalData = Data::count();
        $trainingCount = round(($trainingPercentage / 100) * $totalData);
        $testingCount = $totalData - $trainingCount;
        $trainingData = Data::take($trainingCount)->get();
        $testingData = Data::skip($trainingCount)->take($testingCount)->get();

        $t = Persen::all();

        return view 
        ('perhitungan.perhitungan',
        compact ('dataawal','jumlah','tinggi','sedang','rendah','node1','t',
        'testingData','trainingData','testingCount','trainingCount',
        'sampel1','jumlahsampel1','tinggiS1','sedangS1','rendahS1','node1_1',
        'sampel1_2','jumlahsampel1_2','tinggiS1_2','sedangS1_2','rendahS1_2','node1_2',
        'sampel1_3','jumlahsampel1_3','tinggiS1_3','sedangS1_3','rendahS1_3','node1_3',
        'sampel2_1','jumlahsampel2_1','tinggiS2_1','sedangS2_1','rendahS2_1','node2_1',
        'sampel2_2','jumlahsampel2_2','tinggiS2_2','sedangS2_2','rendahS2_2','node2_2',
    ));
    }

    // ------------------------texting perhitungan2--------------------------------------------------
    public function index2(){

        return view ('perhitungan.perhitungan2',compact('data','tinggiS1','sedangS1','rendahS1','jumlahsampel1','node1_1'));
    }
    

    // -------------------------NODE 1.1-------------------------------------------------------------

    public function nodes1_1()
        {
        if(!Node::where('ket','node 1.1')->exists()){
        $totalData = Sampel::where('ket','Sampel 1')->count();
        $rendahTotal = Sampel::where('ket','Sampel 1')->where('hasil', 'Rendah')->count();
        $sedangTotal = Sampel::where('ket','Sampel 1')->where('hasil', 'Sedang')->count();
        $tinggiTotal = Sampel::where('ket','Sampel 1')->where('hasil', 'Tinggi')->count();
        $entropyTotal = $this->hitungentropy1_1($rendahTotal, $sedangTotal, $tinggiTotal);
        Node::create([
            'ket' => 'node 1.1',
            'variabel' => 'Total',
            'kategori' => '',
            'jumlah' => $totalData,
            'rendah' => $rendahTotal,
            'sedang' => $sedangTotal,
            'tinggi' => $tinggiTotal,
            'entropy' => $entropyTotal,
            'gain' => null,
            'rank' => null,
        ]);
        $variabelList = $this-> cekvariabel1_1('Sampel 1');
        foreach ($variabelList as $variabel) {
            $this->hitungnode1_1($variabel);
        }
        $this->gain1_1();
        $this->getsampel1_2();
        $this->nodes1_2();
        $this->getsampel1_3();
        $this->nodes1_3();
        $this->getsampel2_1();
        $this->nodes2_1();
        $this->getsampel2_2();
        $this->nodes2_2();
        $this->matrix();

        return redirect()->route('perhitungan')->with('message','Data berhasil diolah!');
        }else{
        return redirect()->route('perhitungan')->with('message','Data berhasil diolah!');
    }}

    private function cekvariabel1_1($ket)
      {
        $variabelList = ['P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8', 'P9', 'P10', 'P11', 'P12', 'P13', 'P14', 'P15'];
        foreach ($variabelList as $variabel) {
            $distinctValues = Sampel::where('ket', $ket)->distinct()->pluck($variabel)->filter()->count();
            if ($distinctValues == 1) {
                $variabelList = array_diff($variabelList, [$variabel]);
            }
        }
        return $variabelList;
    }

    private function hitungnode1_1($variabel)
        {
        for ($kategori = 1; $kategori <= 5; $kategori++) {
            $rendah = Sampel::where('ket','Sampel 1')->where('hasil', 'Rendah')->where($variabel, $kategori)->count();
            $sedang = Sampel::where('ket','Sampel 1')->where('hasil', 'Sedang')->where($variabel, $kategori)->count();
            $tinggi = Sampel::where('ket','Sampel 1')->where('hasil', 'Tinggi')->where($variabel, $kategori)->count();
            $jumlah = $rendah + $sedang + $tinggi;
            $entropy = round($this->hitungentropy1_1($rendah, $sedang, $tinggi), 9);
            Node::create([
                'ket' => 'node 1.1',
                'variabel' => $variabel,
                'kategori' => $this->kategori1_1($kategori),
                'jumlah' => $jumlah,
                'rendah' => $rendah,
                'sedang' => $sedang,
                'tinggi' => $tinggi,
                'entropy' => $entropy,
                'gain' => null,
                'rank' => null,
            ]);  

        }
    }

    private function hitungentropy1_1($tidak, $sedang, $tinggi)
     {
        $total = $tidak + $sedang + $tinggi;

        if ($total == 0) {
            return 0;
        }
        $pTidak = $tidak / $total;
        $pSedang = $sedang / $total;
        $pTinggi = $tinggi / $total;
        $entropy = 0;

        if ($pTidak > 0) {
            $entropy -= $pTidak * log($pTidak, 2);
        }

        if ($pSedang > 0) {
            $entropy -= $pSedang * log($pSedang, 2);
        }

        if ($pTinggi > 0) {
            $entropy -= $pTinggi * log($pTinggi, 2);
        }

        return $entropy;
    }

    private function kategori1_1($kategori)
        {
        switch ($kategori) {
            case 1:
                return 'Tidak';
            case 2:
                return 'Sedikit';
            case 3:
                return 'Cukup';
            case 4:
                return 'Mengerti';
            case 5:
                return 'Sangat Mengerti';
            default:
                return 'Tidak Diketahui';
        }
    }

    private function gain1_1()
        {
        $dafvariabel = Node::where('ket', 'node 1.1')
                        ->whereNotIn('variabel', ['Total'])
                        ->pluck('variabel')
                        ->toArray();

        $gainResults = [];
        foreach ($dafvariabel as $variabel) {
        $jtidak = Node::where('ket','node 1.1')->where('variabel', $variabel)->where('kategori', 'Tidak')->value('jumlah');
        $etidak = Node::where('ket','node 1.1')->where('variabel', $variabel)->where('kategori', 'Tidak')->value('entropy');
        
        $jsedang = Node::where('ket','node 1.1')->where('variabel', $variabel)->where('kategori', 'Sedikit')->value('jumlah');
        $esedang = Node::where('ket','node 1.1')->where('variabel', $variabel)->where('kategori', 'Sedikit')->value('entropy');
        
        $jcukup = Node::where('ket','node 1.1')->where('variabel', $variabel)->where('kategori', 'Cukup')->value('jumlah');
        $ecukup = Node::where('ket','node 1.1')->where('variabel', $variabel)->where('kategori', 'Cukup')->value('entropy');
        
        $jmengerti = Node::where('ket','node 1.1')->where('variabel', $variabel)->where('kategori', 'Mengerti')->value('jumlah');
        $emengerti = Node::where('ket','node 1.1')->where('variabel', $variabel)->where('kategori', 'Mengerti')->value('entropy');
        
        $jsangatm = Node::where('ket','node 1.1')->where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('jumlah');
        $esangatm = Node::where('ket','node 1.1')->where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('entropy');
        $gain = $this->hitunggain1_1($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm);
        $gainResults[$variabel] = $gain;
        Node::where('ket','node 1.1')->where('variabel', $variabel)->update(['gain' => $gain]);
        }
        arsort($gainResults);
        $rank = 1;
        foreach ($gainResults as $variabel => $gain) {
        Node::where('ket','node 1.1')->where('variabel', $variabel)->update(['rank' => $rank]);
        $rank++;
        }
        return $gainResults;
    }
    
    private function hitunggain1_1($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm)
        {
        $entropyTotal = Node::where('ket','node 1.1')->where('variabel', 'Total')->value('entropy');
        $jumlahTotal = Node::where('ket','node 1.1')->where('variabel', 'Total')->value('jumlah');

        $gain = $entropyTotal - (
            (($jtidak / $jumlahTotal) * $etidak) +
            (($jsedang / $jumlahTotal) * $esedang) +
            (($jcukup / $jumlahTotal) * $ecukup) +
            (($jmengerti / $jumlahTotal) * $emengerti) +
            (($jsangatm / $jumlahTotal) * $esangatm)
        );

        return $gain;
    }

    // ---------------------------------SAMPEL 1.2------------------------------------------------

     private function getsampel1_2()
        {
        $secondHighestEntropy = Node::where('ket','node 1.1')->where('rank', 1)
        ->orderBy('entropy', 'desc')
        ->skip(1)
        ->take(1)
        ->value('entropy');

        $sampel1Data = Node::where('ket','node 1.1')->where('rank', 1)
        ->where('entropy', $secondHighestEntropy)
        ->first();

        if ($sampel1Data) {
        $kategori = $this->kategorisampel1_2($sampel1Data->kategori);
        $this->saveSampelData1_2($sampel1Data, $kategori);
        }

        return ['sampel1Data' => $sampel1Data ?? null, 'kategori' => $kategori ?? null];
    }

    private function kategorisampel1_2($kategori)
        {
        switch ($kategori) {
        case 'Tidak':
            return 1;
        case 'Sedikit':
            return 2;
        case 'Cukup':
            return 3;
        case 'Mengerti':
            return 4;
        case 'Sangat Mengerti':
            return 5;
        default:
            return 0;
        }
    }

    private function saveSampelData1_2($sampel1Data, $kategori)
     {
        $dataList = Sampel::where($sampel1Data->variabel, $kategori)->get();
        foreach ($dataList as $data) {
            $sampel = Sampel::create([
                'ket' => 'Sampel 1.2',
                'p1' => $data->p1,
                'p2' => $data->p2,
                'p3' => $data->p3,
                'p4' => $data->p4,
                'p5' => $data->p5,
                'p6' => $data->p6,
                'p7' => $data->p7,
                'p8' => $data->p8,
                'p9' => $data->p9,
                'p10' => $data->p10,
                'p11' => $data->p11,
                'p12' => $data->p12,
                'p13' => $data->p13,
                'p14' => $data->p14,
                'p15' => $data->p15,
                'total' => null,
                'hasil' => null,
            ]);

            $this->updateTotalDanHasil1_2($sampel);
        }
    }

    private function updateTotalDanHasil1_2(Sampel $sampel)
     {
        $total = $this->hitungTotalPerRow1_2($sampel);
        $hasil = $this->kategoriHasil1_2($total);

        $sampel->update([
            'total' => $total,
            'hasil' => $hasil,
        ]);
    }

    private function kategoriHasil1_2($total)
     {
        $kategori = 'Rendah';
        if ($total >= 21 && $total <= 59) {
            $kategori = 'Sedang';
        } elseif ($total > 59) {
            $kategori = 'Tinggi';
        }

        return $kategori;
    }

    private function hitungTotalPerRow1_2(Sampel $sampel)
     {
        return array_sum($sampel->only(['p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10', 'p11', 'p12', 'p13', 'p14', 'p15']));
    }
    
    // -------------------------NODE 1.2---------------------------------------------------------
 
    private function nodes1_2()
        {
        $totalData = Sampel::where('ket','Sampel 1.2')->count();
        $rendahTotal = Sampel::where('ket','Sampel 1.2')->where('hasil', 'Rendah')->count();
        $sedangTotal = Sampel::where('ket','Sampel 1.2')->where('hasil', 'Sedang')->count();
        $tinggiTotal = Sampel::where('ket','Sampel 1.2')->where('hasil', 'Tinggi')->count();
        $entropyTotal = $this->hitungentropy1_2($rendahTotal, $sedangTotal, $tinggiTotal);
        Node::create([
            'ket' => 'node 1.2',
            'variabel' => 'Total',
            'kategori' => '',
            'jumlah' => $totalData,
            'rendah' => $rendahTotal,
            'sedang' => $sedangTotal,
            'tinggi' => $tinggiTotal,
            'entropy' => $entropyTotal,
            'gain' => null,
            'rank' => null,
        ]);
        $variabelList = $this-> cekvariabel1_2('Sampel 1.2');
        foreach ($variabelList as $variabel) {
            $this->hitungnode1_2($variabel);
        }
        $this->gain1_2();
        
    }

    private function cekvariabel1_2($ket)
      {
        $variabelList = ['P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8', 'P9', 'P10', 'P11', 'P12', 'P13', 'P14', 'P15'];
        foreach ($variabelList as $variabel) {
            $distinctValues = Sampel::where('ket', $ket)->distinct()->pluck($variabel)->filter()->count();
            if ($distinctValues == 1) {
                $variabelList = array_diff($variabelList, [$variabel]);
            }
        }
        return $variabelList;
    }

    private function hitungnode1_2($variabel)
        {
        for ($kategori = 1; $kategori <= 5; $kategori++) {
            $rendah = Sampel::where('ket','Sampel 1.2')->where('hasil', 'Rendah')->where($variabel, $kategori)->count();
            $sedang = Sampel::where('ket','Sampel 1.2')->where('hasil', 'Sedang')->where($variabel, $kategori)->count();
            $tinggi = Sampel::where('ket','Sampel 1.2')->where('hasil', 'Tinggi')->where($variabel, $kategori)->count();
            $jumlah = $rendah + $sedang + $tinggi;
            $entropy = round($this->hitungentropy1_2($rendah, $sedang, $tinggi), 9);
            Node::create([
                'ket' => 'node 1.2',
                'variabel' => $variabel,
                'kategori' => $this->kategori1_2($kategori),
                'jumlah' => $jumlah,
                'rendah' => $rendah,
                'sedang' => $sedang,
                'tinggi' => $tinggi,
                'entropy' => $entropy,
                'gain' => null,
                'rank' => null,
            ]);  

        }
    }

    private function hitungentropy1_2($tidak, $sedang, $tinggi)
     {
        $total = $tidak + $sedang + $tinggi;

        if ($total == 0) {
            return 0;
        }
        $pTidak = $tidak / $total;
        $pSedang = $sedang / $total;
        $pTinggi = $tinggi / $total;
        $entropy = 0;

        if ($pTidak > 0) {
            $entropy -= $pTidak * log($pTidak, 2);
        }

        if ($pSedang > 0) {
            $entropy -= $pSedang * log($pSedang, 2);
        }

        if ($pTinggi > 0) {
            $entropy -= $pTinggi * log($pTinggi, 2);
        }

        return $entropy;
    }

    private function kategori1_2($kategori)
        {
        switch ($kategori) {
            case 1:
                return 'Tidak';
            case 2:
                return 'Sedikit';
            case 3:
                return 'Cukup';
            case 4:
                return 'Mengerti';
            case 5:
                return 'Sangat Mengerti';
            default:
                return 'Tidak Diketahui';
        }
    }

    private function gain1_2()
        {
        $dafvariabel = Node::where('ket', 'node 1.2')
                        ->whereNotIn('variabel', ['Total'])
                        ->pluck('variabel')
                        ->toArray();

        $gainResults = [];
        foreach ($dafvariabel as $variabel) {
        $jtidak = Node::where('ket','node 1.2')->where('variabel', $variabel)->where('kategori', 'Tidak')->value('jumlah');
        $etidak = Node::where('ket','node 1.2')->where('variabel', $variabel)->where('kategori', 'Tidak')->value('entropy');
        
        $jsedang = Node::where('ket','node 1.2')->where('variabel', $variabel)->where('kategori', 'Sedikit')->value('jumlah');
        $esedang = Node::where('ket','node 1.2')->where('variabel', $variabel)->where('kategori', 'Sedikit')->value('entropy');
        
        $jcukup = Node::where('ket','node 1.2')->where('variabel', $variabel)->where('kategori', 'Cukup')->value('jumlah');
        $ecukup = Node::where('ket','node 1.2')->where('variabel', $variabel)->where('kategori', 'Cukup')->value('entropy');
        
        $jmengerti = Node::where('ket','node 1.2')->where('variabel', $variabel)->where('kategori', 'Mengerti')->value('jumlah');
        $emengerti = Node::where('ket','node 1.2')->where('variabel', $variabel)->where('kategori', 'Mengerti')->value('entropy');
        
        $jsangatm = Node::where('ket','node 1.2')->where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('jumlah');
        $esangatm = Node::where('ket','node 1.2')->where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('entropy');
        $gain = $this->hitunggain1_2($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm);
        $gainResults[$variabel] = $gain;
        Node::where('ket','node 1.2')->where('variabel', $variabel)->update(['gain' => $gain]);
        }
        arsort($gainResults);
        $rank = 1;
        foreach ($gainResults as $variabel => $gain) {
        Node::where('ket','node 1.2')->where('variabel', $variabel)->update(['rank' => $rank]);
        $rank++;
        }
        return $gainResults;
    }
    
    private function hitunggain1_2($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm)
        {
        $entropyTotal = Node::where('ket','node 1.2')->where('variabel', 'Total')->value('entropy');
        $jumlahTotal = Node::where('ket','node 1.2')->where('variabel', 'Total')->value('jumlah');

        $gain = $entropyTotal - (
            (($jtidak / $jumlahTotal) * $etidak) +
            (($jsedang / $jumlahTotal) * $esedang) +
            (($jcukup / $jumlahTotal) * $ecukup) +
            (($jmengerti / $jumlahTotal) * $emengerti) +
            (($jsangatm / $jumlahTotal) * $esangatm)
        );

        return $gain;
    }
    
    // ---------------------------------SAMPEL 1.3-------------------------------------------------

    private function getsampel1_3()
        {
        $secondHighestEntropy = Node::where('ket','node 1.2')->where('rank', 1)
        ->orderBy('entropy', 'desc')
        ->skip(1)
        ->take(1)
        ->value('entropy');

       $sampel1DataList = Node::where('ket', 'node 1.2')->where('rank', 1)
            ->where('entropy', $secondHighestEntropy)
                ->get();

       foreach ($sampel1DataList as $sampel1Data) {
        $kategori = $this->kategorisampel1_3($sampel1Data->kategori);
        $this->saveSampelData1_3($sampel1Data, $kategori);
         }

        return ['sampel1Data' => $sampel1Data ?? null, 'kategori' => $kategori ?? null];
    }

    private function kategorisampel1_3($kategori)
        {
        switch ($kategori) {
        case 'Tidak':
            return 1;
        case 'Sedikit':
            return 2;
        case 'Cukup':
            return 3;
        case 'Mengerti':
            return 4;
        case 'Sangat Mengerti':
            return 5;
        default:
            return 0;
        }
    }

    private function saveSampelData1_3($sampel1Data, $kategori)
     {
        $dataList = Sampel::where('ket','Sampel 1.2')->where($sampel1Data->variabel, $kategori)->get();
        foreach ($dataList as $data) {
            $sampel = Sampel::create([
                'ket' => 'Sampel 1.3',
                'p1' => $data->p1,
                'p2' => $data->p2,
                'p3' => $data->p3,
                'p4' => $data->p4,
                'p5' => $data->p5,
                'p6' => $data->p6,
                'p7' => $data->p7,
                'p8' => $data->p8,
                'p9' => $data->p9,
                'p10' => $data->p10,
                'p11' => $data->p11,
                'p12' => $data->p12,
                'p13' => $data->p13,
                'p14' => $data->p14,
                'p15' => $data->p15,
                'total' => null,
                'hasil' => null,
            ]);

            $this->updateTotalDanHasil1_3($sampel);
        }
    }

    private function updateTotalDanHasil1_3(Sampel $sampel)
     {
        $total = $this->hitungTotalPerRow1_3($sampel);
        $hasil = $this->kategoriHasil1_3($total);

        $sampel->update([
            'total' => $total,
            'hasil' => $hasil,
        ]);
    }

    private function kategoriHasil1_3($total)
     {
        $kategori = 'Rendah';
        if ($total >= 21 && $total <= 59) {
            $kategori = 'Sedang';
        } elseif ($total > 59) {
            $kategori = 'Tinggi';
        }

        return $kategori;
    }

    private function hitungTotalPerRow1_3(Sampel $sampel)
     {
        return array_sum($sampel->only(['p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10', 'p11', 'p12', 'p13', 'p14', 'p15']));
    }
    
    // -------------------------NODE 1.3---------------------------------------------------------
 
    private function nodes1_3()
        {
        $totalData = Sampel::where('ket','Sampel 1.3')->count();
        $rendahTotal = Sampel::where('ket','Sampel 1.3')->where('hasil', 'Rendah')->count();
        $sedangTotal = Sampel::where('ket','Sampel 1.3')->where('hasil', 'Sedang')->count();
        $tinggiTotal = Sampel::where('ket','Sampel 1.3')->where('hasil', 'Tinggi')->count();
        $entropyTotal = $this->hitungentropy1_3($rendahTotal, $sedangTotal, $tinggiTotal);
        Node::create([
            'ket' => 'node 1.3',
            'variabel' => 'Total',
            'kategori' => '',
            'jumlah' => $totalData,
            'rendah' => $rendahTotal,
            'sedang' => $sedangTotal,
            'tinggi' => $tinggiTotal,
            'entropy' => $entropyTotal,
            'gain' => null,
            'rank' => null,
        ]);
        $variabelList = $this-> cekvariabel1_3('Sampel 1.3');
        foreach ($variabelList as $variabel) {
            $this->hitungnode1_3($variabel);
        }
        $this->gain1_3();
    }

    private function cekvariabel1_3($ket)
      {
        $variabelList = ['P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8', 'P9', 'P10', 'P11', 'P12', 'P13', 'P14', 'P15'];
        foreach ($variabelList as $variabel) {
            $distinctValues = Sampel::where('ket', $ket)->distinct()->pluck($variabel)->filter()->count();
            if ($distinctValues == 1) {
                $variabelList = array_diff($variabelList, [$variabel]);
            }
        }
        return $variabelList;
    }
 
    private function hitungnode1_3($variabel)
        {
        for ($kategori = 1; $kategori <= 5; $kategori++) {
            $rendah = Sampel::where('ket','Sampel 1.3')->where('hasil', 'Rendah')->where($variabel, $kategori)->count();
            $sedang = Sampel::where('ket','Sampel 1.3')->where('hasil', 'Sedang')->where($variabel, $kategori)->count();
            $tinggi = Sampel::where('ket','Sampel 1.3')->where('hasil', 'Tinggi')->where($variabel, $kategori)->count();
            $jumlah = $rendah + $sedang + $tinggi;
            $entropy = round($this->hitungentropy1_3($rendah, $sedang, $tinggi), 9);
            Node::create([
                'ket' => 'node 1.3',
                'variabel' => $variabel,
                'kategori' => $this->kategori1_3($kategori),
                'jumlah' => $jumlah,
                'rendah' => $rendah,
                'sedang' => $sedang,
                'tinggi' => $tinggi,
                'entropy' => $entropy,
                'gain' => null,
                'rank' => null,
            ]);  

        }
    }

    private function hitungentropy1_3($tidak, $sedang, $tinggi)
     {
        $total = $tidak + $sedang + $tinggi;

        if ($total == 0) {
            return 0;
        }
        $pTidak = $tidak / $total;
        $pSedang = $sedang / $total;
        $pTinggi = $tinggi / $total;
        $entropy = 0;

        if ($pTidak > 0) {
            $entropy -= $pTidak * log($pTidak, 2);
        }

        if ($pSedang > 0) {
            $entropy -= $pSedang * log($pSedang, 2);
        }

        if ($pTinggi > 0) {
            $entropy -= $pTinggi * log($pTinggi, 2);
        }

        return $entropy;
    }

    private function kategori1_3($kategori)
        {
        switch ($kategori) {
            case 1:
                return 'Tidak';
            case 2:
                return 'Sedikit';
            case 3:
                return 'Cukup';
            case 4:
                return 'Mengerti';
            case 5:
                return 'Sangat Mengerti';
            default:
                return 'Tidak Diketahui';
        }
    }

    private function gain1_3()
        {
        $dafvariabel = Node::where('ket', 'node 1.3')
                        ->whereNotIn('variabel', ['Total'])
                        ->pluck('variabel')
                        ->toArray();

        $gainResults = [];
        foreach ($dafvariabel as $variabel) {
        $jtidak = Node::where('ket','node 1.3')->where('variabel', $variabel)->where('kategori', 'Tidak')->value('jumlah');
        $etidak = Node::where('ket','node 1.3')->where('variabel', $variabel)->where('kategori', 'Tidak')->value('entropy');
        
        $jsedang = Node::where('ket','node 1.3')->where('variabel', $variabel)->where('kategori', 'Sedikit')->value('jumlah');
        $esedang = Node::where('ket','node 1.3')->where('variabel', $variabel)->where('kategori', 'Sedikit')->value('entropy');
        
        $jcukup = Node::where('ket','node 1.3')->where('variabel', $variabel)->where('kategori', 'Cukup')->value('jumlah');
        $ecukup = Node::where('ket','node 1.3')->where('variabel', $variabel)->where('kategori', 'Cukup')->value('entropy');
        
        $jmengerti = Node::where('ket','node 1.3')->where('variabel', $variabel)->where('kategori', 'Mengerti')->value('jumlah');
        $emengerti = Node::where('ket','node 1.3')->where('variabel', $variabel)->where('kategori', 'Mengerti')->value('entropy');
        
        $jsangatm = Node::where('ket','node 1.3')->where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('jumlah');
        $esangatm = Node::where('ket','node 1.3')->where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('entropy');
        $gain = $this->hitunggain1_3($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm);
        $gainResults[$variabel] = $gain;
        Node::where('ket','node 1.3')->where('variabel', $variabel)->update(['gain' => $gain]);
        }
        arsort($gainResults);
        $rank = 1;
        foreach ($gainResults as $variabel => $gain) {
        Node::where('ket','node 1.3')->where('variabel', $variabel)->update(['rank' => $rank]);
        $rank++;
        }
        return $gainResults;
    }
    
    private function hitunggain1_3($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm)
        {
        $entropyTotal = Node::where('ket','node 1.3')->where('variabel', 'Total')->value('entropy');
        $jumlahTotal = Node::where('ket','node 1.3')->where('variabel', 'Total')->value('jumlah');

        $gain = $entropyTotal - (
            (($jtidak / $jumlahTotal) * $etidak) +
            (($jsedang / $jumlahTotal) * $esedang) +
            (($jcukup / $jumlahTotal) * $ecukup) +
            (($jmengerti / $jumlahTotal) * $emengerti) +
            (($jsangatm / $jumlahTotal) * $esangatm)
        );

        return $gain;
    }

    // ---------------------------------SAMPEL 2.1-------------------------------------------------

    private function getsampel2_1()
        {
        $secondHighestEntropy = Node::where('ket','node 1')->where('rank', 1)
        ->orderBy('entropy', 'desc')
        ->take(1)
        ->value('entropy');

       $sampel1DataList = Node::where('ket', 'node 1')->where('rank', 1)
            ->where('entropy', $secondHighestEntropy)
                ->get();

       foreach ($sampel1DataList as $sampel1Data) {
        $kategori = $this->kategorisampel2_1($sampel1Data->kategori);
        $this->saveSampelData2_1($sampel1Data, $kategori);
         }

        return ['sampel1Data' => $sampel1Data ?? null, 'kategori' => $kategori ?? null];
    }

    private function kategorisampel2_1($kategori)
        {
        switch ($kategori) {
        case 'Tidak':
            return 1;
        case 'Sedikit':
            return 2;
        case 'Cukup':
            return 3;
        case 'Mengerti':
            return 4;
        case 'Sangat Mengerti':
            return 5;
        default:
            return 0;
        }
    }

    private function saveSampelData2_1($sampel1Data, $kategori)
     {
        $dataList = Data::where($sampel1Data->variabel, $kategori)->get();
        foreach ($dataList as $data) {
            $sampel = Sampel::create([
                'ket' => 'Sampel 2.1',
                'p1' => $data->p1,
                'p2' => $data->p2,
                'p3' => $data->p3,
                'p4' => $data->p4,
                'p5' => $data->p5,
                'p6' => $data->p6,
                'p7' => $data->p7,
                'p8' => $data->p8,
                'p9' => $data->p9,
                'p10' => $data->p10,
                'p11' => $data->p11,
                'p12' => $data->p12,
                'p13' => $data->p13,
                'p14' => $data->p14,
                'p15' => $data->p15,
                'total' => null,
                'hasil' => null,
            ]);

            $this->updateTotalDanHasil2_1($sampel);
        }
    }

    private function updateTotalDanHasil2_1(Sampel $sampel)
     {
        $total = $this->hitungTotalPerRow2_1($sampel);
        $hasil = $this->kategoriHasil2_1($total);

        $sampel->update([
            'total' => $total,
            'hasil' => $hasil,
        ]);
    }

    private function kategoriHasil2_1($total)
     {
        $kategori = 'Rendah';
        if ($total >= 21 && $total <= 59) {
            $kategori = 'Sedang';
        } elseif ($total > 59) {
            $kategori = 'Tinggi';
        }

        return $kategori;
    }

    private function hitungTotalPerRow2_1(Sampel $sampel)
     {
        return array_sum($sampel->only(['p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10', 'p11', 'p12', 'p13', 'p14', 'p15']));
    }

    // ----------------------------------NODE 2.1-------------------------------------------

    private function nodes2_1()
        {
        $totalData = Sampel::where('ket','Sampel 2.1')->count();
        $rendahTotal = Sampel::where('ket','Sampel 2.1')->where('hasil', 'Rendah')->count();
        $sedangTotal = Sampel::where('ket','Sampel 2.1')->where('hasil', 'Sedang')->count();
        $tinggiTotal = Sampel::where('ket','Sampel 2.1')->where('hasil', 'Tinggi')->count();
        $entropyTotal = $this->hitungentropy2_1($rendahTotal, $sedangTotal, $tinggiTotal);
        Node::create([
            'ket' => 'node 2.1',
            'variabel' => 'Total',
            'kategori' => '',
            'jumlah' => $totalData,
            'rendah' => $rendahTotal,
            'sedang' => $sedangTotal,
            'tinggi' => $tinggiTotal,
            'entropy' => $entropyTotal,
            'gain' => null,
            'rank' => null,
        ]);
        $variabelList = $this-> cekvariabel2_1('Sampel 2.1');
        foreach ($variabelList as $variabel) {
            $this->hitungnode2_1($variabel);
        }
        $this->gain2_1();
    }

    private function cekvariabel2_1($ket)
      {
        $variabelList = ['P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8', 'P9', 'P10', 'P11', 'P12', 'P13', 'P14', 'P15'];
        foreach ($variabelList as $variabel) {
            $distinctValues = Sampel::where('ket', $ket)->distinct()->pluck($variabel)->filter()->count();
            if ($distinctValues == 1) {
                $variabelList = array_diff($variabelList, [$variabel]);
            }
        }
        return $variabelList;
    }
 
    private function hitungnode2_1($variabel)
        {
        for ($kategori = 1; $kategori <= 5; $kategori++) {
            $rendah = Sampel::where('ket','Sampel 2.1')->where('hasil', 'Rendah')->where($variabel, $kategori)->count();
            $sedang = Sampel::where('ket','Sampel 2.1')->where('hasil', 'Sedang')->where($variabel, $kategori)->count();
            $tinggi = Sampel::where('ket','Sampel 2.1')->where('hasil', 'Tinggi')->where($variabel, $kategori)->count();
            $jumlah = $rendah + $sedang + $tinggi;
            $entropy = round($this->hitungentropy2_1($rendah, $sedang, $tinggi), 9);
            Node::create([
                'ket' => 'node 2.1',
                'variabel' => $variabel,
                'kategori' => $this->kategori2_1($kategori),
                'jumlah' => $jumlah,
                'rendah' => $rendah,
                'sedang' => $sedang,
                'tinggi' => $tinggi,
                'entropy' => $entropy,
                'gain' => null,
                'rank' => null,
            ]);  

        }
    }

    private function hitungentropy2_1($tidak, $sedang, $tinggi)
     {
        $total = $tidak + $sedang + $tinggi;

        if ($total == 0) {
            return 0;
        }
        $pTidak = $tidak / $total;
        $pSedang = $sedang / $total;
        $pTinggi = $tinggi / $total;
        $entropy = 0;

        if ($pTidak > 0) {
            $entropy -= $pTidak * log($pTidak, 2);
        }

        if ($pSedang > 0) {
            $entropy -= $pSedang * log($pSedang, 2);
        }

        if ($pTinggi > 0) {
            $entropy -= $pTinggi * log($pTinggi, 2);
        }

        return $entropy;
    }

    private function kategori2_1($kategori)
        {
        switch ($kategori) {
            case 1:
                return 'Tidak';
            case 2:
                return 'Sedikit';
            case 3:
                return 'Cukup';
            case 4:
                return 'Mengerti';
            case 5:
                return 'Sangat Mengerti';
            default:
                return 'Tidak Diketahui';
        }
    }

    private function gain2_1()
        {
        $dafvariabel = Node::where('ket', 'node 2.1')
                        ->whereNotIn('variabel', ['Total'])
                        ->pluck('variabel')
                        ->toArray();

        $gainResults = [];
        foreach ($dafvariabel as $variabel) {
        $jtidak = Node::where('ket','node 2.1')->where('variabel', $variabel)->where('kategori', 'Tidak')->value('jumlah');
        $etidak = Node::where('ket','node 2.1')->where('variabel', $variabel)->where('kategori', 'Tidak')->value('entropy');
        
        $jsedang = Node::where('ket','node 2.1')->where('variabel', $variabel)->where('kategori', 'Sedikit')->value('jumlah');
        $esedang = Node::where('ket','node 2.1')->where('variabel', $variabel)->where('kategori', 'Sedikit')->value('entropy');
        
        $jcukup = Node::where('ket','node 2.1')->where('variabel', $variabel)->where('kategori', 'Cukup')->value('jumlah');
        $ecukup = Node::where('ket','node 2.1')->where('variabel', $variabel)->where('kategori', 'Cukup')->value('entropy');
        
        $jmengerti = Node::where('ket','node 2.1')->where('variabel', $variabel)->where('kategori', 'Mengerti')->value('jumlah');
        $emengerti = Node::where('ket','node 2.1')->where('variabel', $variabel)->where('kategori', 'Mengerti')->value('entropy');
        
        $jsangatm = Node::where('ket','node 2.1')->where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('jumlah');
        $esangatm = Node::where('ket','node 2.1')->where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('entropy');
        $gain = $this->hitunggain2_1($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm);
        $gainResults[$variabel] = $gain;
        Node::where('ket','node 2.1')->where('variabel', $variabel)->update(['gain' => $gain]);
        }
        arsort($gainResults);
        $rank = 1;
        foreach ($gainResults as $variabel => $gain) {
        Node::where('ket','node 2.1')->where('variabel', $variabel)->update(['rank' => $rank]);
        $rank++;
        }
        return $gainResults;
    }
    
    private function hitunggain2_1($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm)
        {
        $entropyTotal = Node::where('ket','node 2.1')->where('variabel', 'Total')->value('entropy');
        $jumlahTotal = Node::where('ket','node 2.1')->where('variabel', 'Total')->value('jumlah');

        $gain = $entropyTotal - (
            (($jtidak / $jumlahTotal) * $etidak) +
            (($jsedang / $jumlahTotal) * $esedang) +
            (($jcukup / $jumlahTotal) * $ecukup) +
            (($jmengerti / $jumlahTotal) * $emengerti) +
            (($jsangatm / $jumlahTotal) * $esangatm)
        );

        return $gain;
    }
    

      // ---------------------------------SAMPEL 2.2-------------------------------------------------

    private function getsampel2_2()
        {
        $secondHighestEntropy = Node::where('ket','node 2.1')->where('rank', 1)
        ->orderBy('entropy', 'desc')
        ->skip(1)
        ->take(1)
        ->value('entropy');

       $sampel1DataList = Node::where('ket', 'node 2.1')->where('rank', 1)
            ->where('entropy', $secondHighestEntropy)
                ->get();

       foreach ($sampel1DataList as $sampel1Data) {
        $kategori = $this->kategorisampel2_2($sampel1Data->kategori);
        $this->saveSampelData2_2($sampel1Data, $kategori);
         }

        return ['sampel1Data' => $sampel1Data ?? null, 'kategori' => $kategori ?? null];
    }

    private function kategorisampel2_2($kategori)
        {
        switch ($kategori) {
        case 'Tidak':
            return 1;
        case 'Sedikit':
            return 2;
        case 'Cukup':
            return 3;
        case 'Mengerti':
            return 4;
        case 'Sangat Mengerti':
            return 5;
        default:
            return 0;
        }
    }

    private function saveSampelData2_2($sampel1Data, $kategori)
     {
        $dataList = Sampel::where('ket','Sampel 2.1')->where($sampel1Data->variabel, $kategori)->get();
        foreach ($dataList as $data) {
            $sampel = Sampel::create([
                'ket' => 'Sampel 2.2',
                'p1' => $data->p1,
                'p2' => $data->p2,
                'p3' => $data->p3,
                'p4' => $data->p4,
                'p5' => $data->p5,
                'p6' => $data->p6,
                'p7' => $data->p7,
                'p8' => $data->p8,
                'p9' => $data->p9,
                'p10' => $data->p10,
                'p11' => $data->p11,
                'p12' => $data->p12,
                'p13' => $data->p13,
                'p14' => $data->p14,
                'p15' => $data->p15,
                'total' => null,
                'hasil' => null,
            ]);

            $this->updateTotalDanHasil2_2($sampel);
        }
    }

    private function updateTotalDanHasil2_2(Sampel $sampel)
     {
        $total = $this->hitungTotalPerRow2_2($sampel);
        $hasil = $this->kategoriHasil2_2($total);

        $sampel->update([
            'total' => $total,
            'hasil' => $hasil,
        ]);
    }

    private function kategoriHasil2_2($total)
     {
        $kategori = 'Rendah';
        if ($total >= 21 && $total <= 59) {
            $kategori = 'Sedang';
        } elseif ($total > 59) {
            $kategori = 'Tinggi';
        }

        return $kategori;
    }

    private function hitungTotalPerRow2_2(Sampel $sampel)
     {
        return array_sum($sampel->only(['p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10', 'p11', 'p12', 'p13', 'p14', 'p15']));
    }

    // ----------------------------------NODE 2.2-------------------------------------------

    private function nodes2_2()
        {
        $totalData = Sampel::where('ket','Sampel 2.2')->count();
        $rendahTotal = Sampel::where('ket','Sampel 2.2')->where('hasil', 'Rendah')->count();
        $sedangTotal = Sampel::where('ket','Sampel 2.2')->where('hasil', 'Sedang')->count();
        $tinggiTotal = Sampel::where('ket','Sampel 2.2')->where('hasil', 'Tinggi')->count();
        $entropyTotal = $this->hitungentropy2_2($rendahTotal, $sedangTotal, $tinggiTotal);
        Node::create([
            'ket' => 'node 2.2',
            'variabel' => 'Total',
            'kategori' => '',
            'jumlah' => $totalData,
            'rendah' => $rendahTotal,
            'sedang' => $sedangTotal,
            'tinggi' => $tinggiTotal,
            'entropy' => $entropyTotal,
            'gain' => null,
            'rank' => null,
        ]);
        $variabelList = $this-> cekvariabel2_2('Sampel 2.2');
        foreach ($variabelList as $variabel) {
            $this->hitungnode2_2($variabel);
        }
        $this->gain2_2();
    }

    private function cekvariabel2_2($ket)
      {
        $variabelList = ['P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8', 'P9', 'P10', 'P11', 'P12', 'P13', 'P14', 'P15'];
        foreach ($variabelList as $variabel) {
            $distinctValues = Sampel::where('ket', $ket)->distinct()->pluck($variabel)->filter()->count();
            if ($distinctValues == 1) {
                $variabelList = array_diff($variabelList, [$variabel]);
            }
        }
        return $variabelList;
    }
 
    private function hitungnode2_2($variabel)
        {
        for ($kategori = 1; $kategori <= 5; $kategori++) {
            $rendah = Sampel::where('ket','Sampel 2.2')->where('hasil', 'Rendah')->where($variabel, $kategori)->count();
            $sedang = Sampel::where('ket','Sampel 2.2')->where('hasil', 'Sedang')->where($variabel, $kategori)->count();
            $tinggi = Sampel::where('ket','Sampel 2.2')->where('hasil', 'Tinggi')->where($variabel, $kategori)->count();
            $jumlah = $rendah + $sedang + $tinggi;
            $entropy = round($this->hitungentropy2_2($rendah, $sedang, $tinggi), 9);
            Node::create([
                'ket' => 'node 2.2',
                'variabel' => $variabel,
                'kategori' => $this->kategori2_2($kategori),
                'jumlah' => $jumlah,
                'rendah' => $rendah,
                'sedang' => $sedang,
                'tinggi' => $tinggi,
                'entropy' => $entropy,
                'gain' => null,
                'rank' => null,
            ]);  

        }
    }

    private function hitungentropy2_2($tidak, $sedang, $tinggi)
     {
        $total = $tidak + $sedang + $tinggi;

        if ($total == 0) {
            return 0;
        }
        $pTidak = $tidak / $total;
        $pSedang = $sedang / $total;
        $pTinggi = $tinggi / $total;
        $entropy = 0;

        if ($pTidak > 0) {
            $entropy -= $pTidak * log($pTidak, 2);
        }

        if ($pSedang > 0) {
            $entropy -= $pSedang * log($pSedang, 2);
        }

        if ($pTinggi > 0) {
            $entropy -= $pTinggi * log($pTinggi, 2);
        }

        return $entropy;
    }

    private function kategori2_2($kategori)
        {
        switch ($kategori) {
            case 1:
                return 'Tidak';
            case 2:
                return 'Sedikit';
            case 3:
                return 'Cukup';
            case 4:
                return 'Mengerti';
            case 5:
                return 'Sangat Mengerti';
            default:
                return 'Tidak Diketahui';
        }
    }

    private function gain2_2()
        {
        $dafvariabel = Node::where('ket', 'node 2.2')
                        ->whereNotIn('variabel', ['Total'])
                        ->pluck('variabel')
                        ->toArray();

        $gainResults = [];
        foreach ($dafvariabel as $variabel) {
        $jtidak = Node::where('ket','node 2.2')->where('variabel', $variabel)->where('kategori', 'Tidak')->value('jumlah');
        $etidak = Node::where('ket','node 2.2')->where('variabel', $variabel)->where('kategori', 'Tidak')->value('entropy');
        
        $jsedang = Node::where('ket','node 2.2')->where('variabel', $variabel)->where('kategori', 'Sedikit')->value('jumlah');
        $esedang = Node::where('ket','node 2.2')->where('variabel', $variabel)->where('kategori', 'Sedikit')->value('entropy');
        
        $jcukup = Node::where('ket','node 2.2')->where('variabel', $variabel)->where('kategori', 'Cukup')->value('jumlah');
        $ecukup = Node::where('ket','node 2.2')->where('variabel', $variabel)->where('kategori', 'Cukup')->value('entropy');
        
        $jmengerti = Node::where('ket','node 2.2')->where('variabel', $variabel)->where('kategori', 'Mengerti')->value('jumlah');
        $emengerti = Node::where('ket','node 2.2')->where('variabel', $variabel)->where('kategori', 'Mengerti')->value('entropy');
        
        $jsangatm = Node::where('ket','node 2.2')->where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('jumlah');
        $esangatm = Node::where('ket','node 2.2')->where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('entropy');
        $gain = $this->hitunggain2_2($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm);
        $gainResults[$variabel] = $gain;
        Node::where('ket','node 2.2')->where('variabel', $variabel)->update(['gain' => $gain]);
        }
        arsort($gainResults);
        $rank = 1;
        foreach ($gainResults as $variabel => $gain) {
        Node::where('ket','node 2.2')->where('variabel', $variabel)->update(['rank' => $rank]);
        $rank++;
        }
        return $gainResults;
    }
    
    private function hitunggain2_2($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm)
        {
        $entropyTotal = Node::where('ket','node 2.2')->where('variabel', 'Total')->value('entropy');
        $jumlahTotal = Node::where('ket','node 2.2')->where('variabel', 'Total')->value('jumlah');

        $gain = $entropyTotal - (
            (($jtidak / $jumlahTotal) * $etidak) +
            (($jsedang / $jumlahTotal) * $esedang) +
            (($jcukup / $jumlahTotal) * $ecukup) +
            (($jmengerti / $jumlahTotal) * $emengerti) +
            (($jsangatm / $jumlahTotal) * $esangatm)
        );

        return $gain;
    }
    

    private function matrix(){
        $persen = 100; 
        $total = Data::count(); 
        $banyak = intval(($persen / 100) * $total);
        $r1 = Data::take($banyak)->where('hasil','Rendah')->count(); 
        $s2 = Data::take($banyak)->where('hasil','Sedang')->count(); 
        $t3 = Data::take($banyak)->where('hasil','Tinggi')->count(); 

       Matrix::create([
        'persen'=>$persen,
        'banyak' =>$banyak,
        'r1' =>$r1,
        'r2' =>'0',
        'r3' =>'0',
        's1' =>'0',
        's2' =>$s2,
        's3' =>'0',
        't1' =>'0',
        't2' =>'0',
        't3' =>$t3,
       ]);
    }
}
