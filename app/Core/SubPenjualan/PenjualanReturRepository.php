<?php namespace App\Core\SubPenjualan;

use App\Models\Penjualan\PenjualanRetur;

class PenjualanReturRepository
{
    public static function kode()
    {
        return null;
    }

    public static function getById($penjualanReturId)
    {
        return PenjualanRetur::find($penjualanReturId);
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $data['active_session'] = session('ClosedCash');
        $penjualanRetur = PenjualanRetur::create($data);
        $penjualanRetur->penjualanReturDetail()->createMany($data['dataDetail']);
        return $penjualanRetur->refresh();
    }

    public static function update(array $data)
    {
        $penjualanRetur = self::getById($data['penjualan_retur_id']);
        $penjualanRetur->update($data);
        $penjualanRetur->penjualanReturDetail()->createMany($data['dataDetail']);
        return $penjualanRetur->refresh();
    }

    public static function rollback($penjualanReturId)
    {
        $penjualanRetur = self::getById($penjualanReturId);
        return $penjualanRetur->penjualanReturDetail()->delete();
    }

    public static function destroy($penjualanReturId)
    {
        $penjualanRetur = self::getById($penjualanReturId);
        $penjualanRetur->penjualanReturDetail()->delete();
        return $penjualanRetur->delete();
    }
}
