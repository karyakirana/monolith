<?php namespace App\Core\SubStock;

use App\Models\Stock\StockMutasi;

class StockMutasiRepository
{
    public static function kode($jenisMutasi)
    {
        return null;
    }

    public static function getById($stockMutasiId)
    {
        return StockMutasi::find($stockMutasiId);
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode($data['jenis_mutasi']);
        $stockMutasi = StockMutasi::create($data);
        $stockMutasi->stockMutasiDetail()->createMany($data['dataDetail']);
        return $stockMutasi->refresh();
    }

    public static function update(array $data)
    {
        $stockMutasi = self::getById($data['stock_mutasi_id']);
        $stockMutasi->update($data);
        $stockMutasi->stockMutasiDetail()->createMany($data['dataDetail']);
        return $stockMutasi->refresh();
    }

    public static function rollback($stockMutasiId)
    {
        $stockMutasi = self::getById($stockMutasiId);
        return $stockMutasi->stockMutasiDetail()->delete();
    }
}
