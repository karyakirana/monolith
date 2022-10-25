<?php

namespace App\Models\Penjualan;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanReturDetail extends Model
{
    use HasFactory,
        ProdukModelTrait;
    protected $table = 'penjualan_retur_detail';
    protected $fillable = [
        'penjualan_retur_id',
        'produk_id',
        'harga',
        'jumlah',
        'diskon',
        'sub_total',
    ];

    public function penjualanRetur()
    {
        $this->belongsTo(PenjualanRetur::class, 'penjualan_retur_id');
    }
}
