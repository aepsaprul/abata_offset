<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffsetBiayaJasaKalender extends Model
{
    use HasFactory;

    public function mesin() {
        return $this->belongsTo(OffsetMesin::class, 'mesin_id', 'id');
    }

    public function warna() {
        return $this->belongsTo(OffsetWarna::class, 'warna_id', 'id');
    }

    public function gramasi() {
        return $this->belongsTo(OffsetGramasi::class, 'gramasi_id', 'id');
    }
}
