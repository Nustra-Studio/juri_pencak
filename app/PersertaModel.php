<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersertaModel extends Model
{
    use HasFactory;
    protected $table = 'persertas';
    protected $fillable =[
        'id_perserta',
        'id_kontigen',
        'gender',
        'usia_category',
        'berat_badan',
        'tinggi_badan',
        'category',
        'kelas',
        'name'
    ];
}
