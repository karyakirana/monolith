<?php

namespace App\Models\Stock;

use App\Models\Master\SupplierModelTrait;
use App\Models\UserModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPreorder extends Model
{
    use HasFactory,
        SupplierModelTrait,
        UserModelTrait;
    protected $table = 'stock_preorder';
    protected $fillable = [
        'active_cash',
        'kode',
        'tgl_preorder',
        'tgl_selesai',
        'status',
        'supplier_id',
        'user_id',
        'total_barang',
        'keterangan',
    ];

    public function tglPreorder():Attribute
    {
        return Attribute::make();
    }

    public function tglSelesai():Attribute
    {
        return Attribute::make();
    }

    public function stockPreorderDetail()
    {
        return $this->hasMany(StockPreorderDetail::class, 'stock_preorder_id');
    }
}
