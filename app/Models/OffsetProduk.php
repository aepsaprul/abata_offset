<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffsetProduk extends Model
{
    use HasFactory;

    public function kertas() {
        return $this->hasMany(OffsetKertasProduk::class, 'produk_id', 'id');
    }

    public function finishing() {
        return $this->hasMany(OffsetFinishingProduk::class, 'produk_id', 'id');
    }
}
