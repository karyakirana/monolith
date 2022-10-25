<?php

namespace App\Models\Stock;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockKeluarDetail extends Model
{
    use HasFactory,
        ProdukModelTrait;
    protected $table = 'stock_keluar_detail';
    protected $fillable = [
        'stock_keluar_id',
        'produk_id',
        'jumlah',
    ];

    public function stockKeluar()
    {
        return $this->belongsTo(StockKeluar::class, 'stock_keluar_id');
    }
}
