<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OffsetKertas;

class OffsetBahan extends Model
{
    use HasFactory;

    public function kertas() {
        return $this->belongsTo(OffsetKertas::class, 'offset_kertas_id', 'id');
    }
}
