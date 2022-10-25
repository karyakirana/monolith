<?php

namespace App\Models\Stock;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpnameDetail extends Model
{
    use HasFactory,
        ProdukModelTrait;
    protected $table = 'stock_opname_detail';
    protected $fillable = [
        'stock_opname_id',
        'produk_id',
        'jumlah',
    ];

    public function stockOpname()
    {
        return $this->belongsTo(StockOpname::class, 'stock_opname_id');
    }
}
