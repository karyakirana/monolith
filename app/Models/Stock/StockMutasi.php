<?php

namespace App\Models\Stock;

use App\Models\Master\GudangModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMutasi extends Model
{
    use HasFactory,
        GudangModelTrait;
    protected $table = 'stock_mutasi';
    protected $fillable = [
        'active_cash',
        'kode',
        'jenis_mutasi',
        'gudang_asal_id',
        'gudang_tujuan_id',
        'tgl_mutasi',
        'user_id',
        'keterangan',
    ];

    public function tglMutasi():Attribute
    {
        return Attribute::make();
    }

    public function stockMutasiDetail()
    {
        return $this->hasMany(StockMutasiDetail::class, 'stock_mutasi_id');
    }
}
