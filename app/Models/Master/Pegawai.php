<?php

namespace App\Models\Master;

use App\Models\UserModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory,
        UserModelTrait;
    protected $table = 'pegawai';
    protected $fillable = [
        'kode',
        'user_id',
        'gender',
        'jabatan',
        'telepon',
        'alamat',
        'keterangan',
    ];
}
