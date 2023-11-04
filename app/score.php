<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class score extends Model
{
    use HasFactory;
    protected $fillable = [
        'score', 'keterangan', 'id_perserta','id_juri','status',
    ];
}
