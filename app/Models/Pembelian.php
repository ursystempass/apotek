<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detailPembelians()
    {
        return $this->hasMany(DetailPembelian::class);
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
