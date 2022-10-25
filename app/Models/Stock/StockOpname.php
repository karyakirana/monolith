<?php

namespace App\Models\Stock;

use App\Models\Master\GudangModelTrait;
use App\Models\Master\Pegawai;
use App\Models\UserModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    use HasFactory,
        GudangModelTrait,
        UserModelTrait;
    protected $table = 'stock_opname';
    protected $fillable = [
        'active_cash',
        'kode',
        'kondisi',
        'tgl_input',
        'gudang_id',
        'user_id',
        'pegawai_id',
        'keterangan',
    ];

    public function tglInput():Attribute
    {
        return Attribute::make();
    }

    public function stockOpnameDetail()
    {
        return $this->hasMany(StockOpnameDetail::class, 'stock_opname_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
