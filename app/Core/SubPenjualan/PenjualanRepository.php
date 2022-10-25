<?php namespace App\Core\SubPenjualan;

use App\Models\Penjualan\Penjualan;

class PenjualanRepository
{
    public static function kode()
    {
        return null;
    }

    public static function getById($penjualanId)
    {
        return Penjualan::find($penjualanId);
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $data['active_session'] = session('ClosedCash');
        $penjualan = Penjualan::create($data);
        $penjualan->penjualanDetail()->createMany($data['dataDetail']);
        return $penjualan->refresh();
    }

    public static function update(array $data)
    {
        $penjualan = self::getById($data['penjualan_id']);
        $penjualan->update($data);
        $penjualan->penjualanDetail()->create($data['dataDetail']);
        return $penjualan->refresh();
    }

    public static function rollback($penjualanId)
    {
        $penjualan = self::getById($penjualanId);
        return $penjualan->penjualanDetail()->delete();
    }

    public static function destroy($penjualanId)
    {
        $penjualan = self::getById($penjualanId);
        $penjualan->penjualanDetail()->delete();
        return $penjualan->delete();
    }
}
