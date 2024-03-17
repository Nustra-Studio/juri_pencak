<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GjadwalModel extends Model
{
    use HasFactory;
    protected $table = 'jadwal_group';
    protected $fillable =[
        'partai',
        'kelas',
        'merah',
        'biru',
        'skor_biru',
        'skor_merah',
        'pemenang',
        'kondisi', 
        'status'
    ];
}
