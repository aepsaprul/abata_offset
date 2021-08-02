<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffsetFinishingProduk extends Model
{
    use HasFactory;

    public function finishing() {
        return $this->belongsTo(OffsetFinishing::class, 'finishing_id', 'id');
    }

    public function produk() {
        return $this->belongsTo(OffsetProduk::class, 'produk_id', 'id');
    }
}
