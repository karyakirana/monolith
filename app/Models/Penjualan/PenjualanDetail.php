<?php

namespace App\Models\Penjualan;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory,
        ProdukModelTrait;
    protected $table = 'penjualan_detail';
    protected $fillable = [
        'produk_id',
        'harga',
        'jumlah',
        'diskon',
        'sub_total',
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }
}
