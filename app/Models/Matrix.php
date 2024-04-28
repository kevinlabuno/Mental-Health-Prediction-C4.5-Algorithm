<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrix extends Model
{
    use HasFactory;

    protected $table = 'matrix';
    protected $fillable = ['persen','banyak','r1','r2','r3','s1','s2','s3','t1','t2','t3'];
}
