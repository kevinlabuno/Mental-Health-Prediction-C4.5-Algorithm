<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urutan</title>
    <style>
        /* CSS untuk memberikan indentasi pada teks berurutan */
        #output {
            width: 100%;
            height: 200px; /* Sesuaikan tinggi textarea sesuai kebutuhan */
            font-family: 'Courier New', monospace; /* Memastikan tampilan tetap rapi */
            white-space: pre-wrap; /* Menggunakan pre-wrap untuk menjaga spasi dan baris baru */
        }

        .indent {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <textarea id="output" readonly>
1. Anggota : Kevin
2. Kepala Bagian : Sando
   2.1 Kepala Biro : Sandi
      3. Kasubbag : Vinca
      3.1 Kasubbag Jarlat : Sindi
    </textarea>
</body>
</html>