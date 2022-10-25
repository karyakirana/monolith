<?php

namespace App\Models\Penjualan;

use App\Models\Master\CustomerModelTrait;
use App\Models\Master\GudangModelTrait;
use App\Models\UserModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanRetur extends Model
{
    use HasFactory,
        GudangModelTrait,
        CustomerModelTrait,
        UserModelTrait;
    protected $table = 'penjualan_retur';
    protected $fillable = [
        'active_cash',
        'kode',
        'kondisi',
        'gudang_id',
        'customer_id',
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
    ];

    public function tglNota():Attribute
    {
        return Attribute::make();
    }

    public function tglTempo():Attribute
    {
        return Attribute::make();
    }

    public function penjualanReturDetail()
    {
        return $this->hasMany(PenjualanReturDetail::class, 'penjualan_retur_id');
    }
}
