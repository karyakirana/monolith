<?php

namespace App\Models\Stock;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPreorderDetail extends Model
{
    use HasFactory,
        ProdukModelTrait;
    protected $table = 'stock_preorder_detail';
    protected $fillable = [
        'stock_preorder_id',
        'produk_id',
        'jumlah'
    ];

    public function stockPreorder()
    {
        return $this->belongsTo(StockPreorder::class, 'stock_preorder_id');
    }
}
