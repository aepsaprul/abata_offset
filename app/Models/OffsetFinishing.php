<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffsetFinishing extends Model
{
    use HasFactory;

    public function produk() {
        return $this->belongsTo(App\Model\OffsetProduk::class, 'produk_id', 'id');
    }
}
