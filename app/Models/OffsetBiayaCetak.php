<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OffsetMasterMesin;

class OffsetBiayaCetak extends Model
{
    use HasFactory;

    public function mesin() {
        return $this->belongsTo(OffsetMasterMesin::class, 'offset_mesin_id', 'id');
    }
}
