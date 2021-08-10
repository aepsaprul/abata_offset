<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffsetUkuranCetakDetail extends Model
{
    use HasFactory;

    public function ukuranCetak() {
        return $this->belongsTo(OffsetUkuranCetak::class, 'ukuran_cetak_id', 'id');
    }

    public function kertas() {
        return $this->belongsTo(OffsetKertas::class, 'kertas_id', 'id');
    }

    public function mesin() {
        return $this->belongsTo(OffsetMesin::class, 'mesin_id', 'id');
    }
}
