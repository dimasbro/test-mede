<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    protected $table = 'komoditas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'komoditas_kode',
        'komoditas_nama'
    ];

}
