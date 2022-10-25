<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierJenis extends Model
{
    use HasFactory;
    protected $table = 'supplier_jenis';
    protected $fillable = [
        'jenis',
        'keterangan',
    ];

    public function supplier()
    {
        return $this->hasMany(Supplier::class, 'supplier_jenis_id');
    }
}
