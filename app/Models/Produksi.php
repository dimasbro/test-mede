<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'komoditas_id',
        'tanggal',
        'jumlah'
    ];

    public function komoditas()
    {
        return $this->belongsTo(Komoditas::class, 'komoditas_id', 'id');
    }

}
