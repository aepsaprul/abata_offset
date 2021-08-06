<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffsetKertas extends Model
{
    use HasFactory;

    public function bahan() {
        return $this->hasMany(OffsetBahan::class);
    }
}
