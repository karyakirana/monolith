<?php

namespace App\Models\Stock;

use App\Models\Master\GudangModelTrait;
use App\Models\Master\SupplierModelTrait;
use App\Models\UserModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMasuk extends Model
{
    use HasFactory,
        GudangModelTrait,
        SupplierModelTrait,
        UserModelTrait;
    protected $table = 'stock_masuk';
    protected $fillable = [
        'active_cash',
        'kode',
        'nomor_surat_jalan',
        'stockable_masuk_type',
        'stockable_masuk_id',
        'kondisi',
        'gudang_id',
        'supplier_id',
        'tgl_masuk',
        'user_id',
        'nomor_po',
        'keterangan',
    ];

    public function tglMasuk():Attribute
    {
        return Attribute::make();
    }

    public function stockMasukDetail()
    {
        return $this->hasMany(StockMasukDetail::class, 'stock_masuk_id');
    }

    public function stockableMasuk()
    {
        return $this->morphTo(__FUNCTION__, 'stockable_masuk_type', 'stockable_masuk_id');
    }
}
