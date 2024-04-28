<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;
    protected $table = 'node';
    protected $fillable =['id','ket','variabel','kategori','jumlah','rendah','sedang','tinggi','entropy','gain','rank'];

}
