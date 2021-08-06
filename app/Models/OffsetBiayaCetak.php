<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffsetBiayaCetak extends Model
{
    use HasFactory;

    public function mesin() {
        return $this->belongsTo(OffsetMasterMesin::class, 'mesin_id', 'id');
    }
}
