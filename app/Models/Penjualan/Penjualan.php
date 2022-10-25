<?php

namespace App\Models\Penjualan;

use App\Models\Master\CustomerModelTrait;
use App\Models\Master\GudangModelTrait;
use App\Models\Stock\StockKeluar;
use App\Models\UserModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory,
        CustomerModelTrait,
        GudangModelTrait,
        UserModelTrait;

    protected $table = 'penjualan';
    protected $fillable = [
        'active_cash',
        'kode',
        'customer_id',
        'gudang_id',
        'user_id',
        'tgl_nota',
        'jenis_bayar',
        'tgl_tempo',
        'status_bayar',
        'total_barang',
        'ppn',
        'biaya_lain',
        'total_bayar',
        'keterangan',
        'print',
    ];

    public function tglNota():Attribute
    {
        return Attribute::make();
    }

    public function tglTempo():Attribute
    {
        return Attribute::make();
    }

    public function penjualanDetail()
    {
        return $this->hasMany(PenjualanDetail::class, 'penjualan_id');
    }

    public function stockKeluar()
    {
        return $this->morphOne(StockKeluar::class, 'stockableKeluar', 'stockable_keluar_type', 'stockable_keluar_id');
    }
}
