<?php

namespace App\Models\Stock;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMutasiDetail extends Model
{
    use HasFactory,
        ProdukModelTrait;
    protected $table = 'stock_mutasi_detail';
    protected $fillable = [
        'stock_mutasi_id',
        'produk_id',
        'jumlah'
    ];

    public function stockMutasi()
    {
        return $this->belongsTo(StockMutasi::class, 'stock_mutasi_id');
    }
}
