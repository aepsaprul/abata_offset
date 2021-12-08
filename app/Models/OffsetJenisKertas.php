<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffsetJenisKertas extends Model
{
    use HasFactory;

    public function gramasi() {
        return $this->belongsTo(OffsetGramasi::class, 'gramasi_id', 'id');
    }

    public function kertas() {
        return $this->belongsTo(OffsetKertas::class, 'kertas_id', 'id');
    }
}
