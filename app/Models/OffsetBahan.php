<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffsetBahan extends Model
{
    use HasFactory;

    public function kertas() {
        return $this->belongsTo(OffsetKertas::class, 'kertas_id', 'id');
    }
}
