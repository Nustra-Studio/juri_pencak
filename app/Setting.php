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
        '1',
        '2',
        'keterangan',
    ];
}
