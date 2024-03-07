<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable =[
        'judul',
        'arena',
        'babak',
        'biru',
        'merah',
        'keterangan',
        'juri_1',
        'juri_2',
        'juri_3',
        'time'
    ];
}
