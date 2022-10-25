<?php

namespace App\Models\Stock;

use App\Models\Master\GudangModelTrait;
use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInventory extends Model
{
    use HasFactory,
        ProdukModelTrait,
        GudangModelTrait;
    protected $table = 'stock_inventory';
    protected $fillable = [
        'active_cash',
        'kondisi',
        'gudang_id',
        'produk_id',
        'stock_awal',
        'stock_opname',
        'stock_masuk',
        'stock_keluar',
        'stock_saldo',
    ];
}
