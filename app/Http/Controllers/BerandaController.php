<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\Node;
use App\Models\Sampel;
use App\Models\Persen;

class BerandaController extends Controller
{


    public function index()
        {
        return view ('beranda');
    }

    public function upload(Request $request)
     {

         $messages = [
            'required' => ':attribute Tidak boleh kosong !!!',
            'file.mimetypes' => 'File :attribute harus berupa file CSV (Comma delimited).',
            'file' => 'File :attribute harus berupa file CSV.',
        ];

        $this->validate($request, [
            'file' => 'required|file|mimetypes:text/csv,application/csv,text/plain,text/comma-separated-values,text/x-csv,application/excel,application/vnd.ms-excel,application/vnd.msexcel',
            'number' => 'required',
        ], $messages);
      

        $trainingPercentage = $request->number;
        $testingPercentage = 100 - $trainingPercentage;
        Persen::create([
            'training' => $trainingPercentage,
            'testing' => $testingPercentage,
        ]);

        if ($request->hasFile('file')) {
        $file = $request->file('file');
        $csvData = file_get_contents($file->path());
        $rows = explode(PHP_EOL, $csvData);
        $skipFirstRow = true;

        foreach ($rows as $row) {
            if ($skipFirstRow) {
                $skipFirstRow = false;
                continue;
            }
            $rowData = str_getcsv($row);
            if (count($rowData) != count(['nim', 'umur', 'p1', 'p2', 'p3', 
            'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10', 
            'p11', 'p12', 'p13', 'p14', 'p15'])) {
                continue;
            }
            $total = array_sum(array_slice($rowData, 2, 15));
            $rowData[] = $total;
            
            $kategori = 'Rendah';
            if ($total >= 21 && $total <= 59) {
                $kategori = 'Sedang';
            } elseif ($total > 59) {
                $kategori = 'Tinggi';
            }
            $rowData[] = $kategori;

            $data = array_combine(['nim', 'umur', 'p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10', 'p11', 'p12', 'p13', 'p14', 'p15', 'total', 'hasil'], $rowData);
            Data::create($data);
        }

         $this->nodes1();
        return redirect()->route('priview')->with('success', 'Data berhasil diunggah!');
        }
        return redirect()->back()->with('error', 'Gagal mengunggah file. Pastikan file CSV sudah dipilih.');
    }

    // --------------------------------NODE 1--------------------------------------------

    public function nodes1()
        {
        $totalData = Data::count();
        $rendahTotal = Data::where('hasil', 'Rendah')->count();
        $sedangTotal = Data::where('hasil', 'Sedang')->count();
        $tinggiTotal = Data::where('hasil', 'Tinggi')->count();
        $entropyTotal = $this->hitungentropy1($rendahTotal, $sedangTotal, $tinggiTotal);
        Node::create([
            'ket' => 'node 1',
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
        $variabelList = ['P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8', 'P9', 'P10', 'P11', 'P12', 'P13', 'P14', 'P15'];
        foreach ($variabelList as $variabel) {
            $this->hitungnode1($variabel);
        }

        $this->gain1();
        $this->getsampel1();
    }

    private function hitungnode1($variabel)
        {
        for ($kategori = 1; $kategori <= 5; $kategori++) {
            $rendah = Data::where('hasil', 'Rendah')->where($variabel, $kategori)->count();
            $sedang = Data::where('hasil', 'Sedang')->where($variabel, $kategori)->count();
            $tinggi = Data::where('hasil', 'Tinggi')->where($variabel, $kategori)->count();
            $jumlah = $rendah + $sedang + $tinggi;
            $entropy = round($this->hitungentropy1($rendah, $sedang, $tinggi), 9);
            Node::create([
                'ket' => 'node 1',
                'variabel' => $variabel,
                'kategori' => $this->kategori1($kategori),
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

    private function hitungentropy1($tidak, $sedang, $tinggi)
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

    private function kategori1($kategori)
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

    private function gain1()
        {
        $variabelValues = ['P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8', 'P9', 'P10', 'P11', 'P12', 'P13', 'P14', 'P15'];

        $gainResults = [];
        foreach ($variabelValues as $variabel) {
        $jtidak = Node::where('variabel', $variabel)->where('kategori', 'Tidak')->value('jumlah');
        $etidak = Node::where('variabel', $variabel)->where('kategori', 'Tidak')->value('entropy');
        
        $jsedang = Node::where('variabel', $variabel)->where('kategori', 'Sedikit')->value('jumlah');
        $esedang = Node::where('variabel', $variabel)->where('kategori', 'Sedikit')->value('entropy');
        
        $jcukup = Node::where('variabel', $variabel)->where('kategori', 'Cukup')->value('jumlah');
        $ecukup = Node::where('variabel', $variabel)->where('kategori', 'Cukup')->value('entropy');
        
        $jmengerti = Node::where('variabel', $variabel)->where('kategori', 'Mengerti')->value('jumlah');
        $emengerti = Node::where('variabel', $variabel)->where('kategori', 'Mengerti')->value('entropy');
        
        $jsangatm = Node::where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('jumlah');
        $esangatm = Node::where('variabel', $variabel)->where('kategori', 'Sangat Mengerti')->value('entropy');
        $gain = $this->hitunggain1($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm);
        $gainResults[$variabel] = $gain;
        Node::where('variabel', $variabel)->update(['gain' => $gain]);
        }
        arsort($gainResults);
        $rank = 1;
        foreach ($gainResults as $variabel => $gain) {
        Node::where('variabel', $variabel)->update(['rank' => $rank]);
        $rank++;
        }
        return $gainResults;
    }
    
    private function hitunggain1($jtidak, $etidak, $jsedang, $esedang, $jcukup, $ecukup, $jmengerti, $emengerti, $jsangatm, $esangatm)
        {
        $entropyTotal = Node::where('variabel', 'Total')->value('entropy');
        $jumlahTotal = Node::where('variabel', 'Total')->value('jumlah');

        $gain = $entropyTotal - (
            (($jtidak / $jumlahTotal) * $etidak) +
            (($jsedang / $jumlahTotal) * $esedang) +
            (($jcukup / $jumlahTotal) * $ecukup) +
            (($jmengerti / $jumlahTotal) * $emengerti) +
            (($jsangatm / $jumlahTotal) * $esangatm)
        );

        return $gain;
    }

    // --------------------------------Sampel 1.1--------------------------------------------

     private function getsampel1()
        {
        $secondHighestEntropy = Node::where('rank', 1)
        ->orderBy('entropy', 'desc')
        ->skip(1)
        ->take(1)
        ->value('entropy');

        $sampel1Data = Node::where('rank', 1)
        ->where('entropy', $secondHighestEntropy)
        ->first();

        if ($sampel1Data) {
        $kategori = $this->kategorisampel1($sampel1Data->kategori);
        $this->saveSampelData($sampel1Data, $kategori);
        }

        return ['sampel1Data' => $sampel1Data ?? null, 'kategori' => $kategori ?? null];
    }

    private function kategorisampel1($kategori)
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

    private function saveSampelData($sampel1Data, $kategori)
     {
        $dataList = Data::where($sampel1Data->variabel, $kategori)->get();
        foreach ($dataList as $data) {
            $sampel = Sampel::create([
                'ket' => 'Sampel 1',
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

            $this->updateTotalDanHasil($sampel);
        }
    }

    private function updateTotalDanHasil(Sampel $sampel)
     {
        $total = $this->hitungTotalPerRow($sampel);
        $hasil = $this->kategoriHasil($total);

        $sampel->update([
            'total' => $total,
            'hasil' => $hasil,
        ]);
    }

    private function kategoriHasil($total)
     {
        $kategori = 'Rendah';
        if ($total >= 21 && $total <= 59) {
            $kategori = 'Sedang';
        } elseif ($total > 59) {
            $kategori = 'Tinggi';
        }

        return $kategori;
    }

    private function hitungTotalPerRow(Sampel $sampel)
     {
        return array_sum($sampel->only(['p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10', 'p11', 'p12', 'p13', 'p14', 'p15']));
    }

}
