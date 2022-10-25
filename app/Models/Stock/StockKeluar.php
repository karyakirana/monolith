<?php

namespace App\Models\Stock;

use App\Models\Master\GudangModelTrait;
use App\Models\Master\SupplierModelTrait;
use App\Models\UserModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockKeluar extends Model
{
    use HasFactory,
        SupplierModelTrait,
        GudangModelTrait,
        UserModelTrait;
    protected $table = 'stock_keluar';
    protected $fillable = [
        'active_cash',
        'kode',
        'stockable_keluar_type',
        'stockable_keluar_id',
        'supplier_id',
        'kondisi',
        'gudang_id',
        'tgl_keluar',
        'user_id',
        'keterangan',
    ];

    public function tglKeluar():Attribute
    {
        return Attribute::make();
    }

    public function stockKeluarDetail()
    {
        return $this->hasMany(StockKeluarDetail::class, 'stock_keluar_id');
    }

    public function stockableKeluar()
    {
        return $this->morphTo(__FUNCTION__, 'stockable_keluar_type', 'stockable_keluar_id');
    }
}
