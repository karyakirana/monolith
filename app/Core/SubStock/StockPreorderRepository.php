<?php namespace App\Core\SubStock;

use App\Models\Stock\StockPreorder;

class StockPreorderRepository
{
    public static function kode()
    {
        return null;
    }

    public static function getById($stockPreorderId)
    {
        return StockPreorder::find($stockPreorderId);
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode();
        $stockPreorder = StockPreorder::create($data);
        $stockPreorder->stockPreorderDetail()->createMany($data['dataDetail']);
        return $stockPreorder->refresh();
    }

    public function update(array $data)
    {
        $stockPreorder = self::getById($data['stock_preorder_id']);
        $stockPreorder->update($data);
        $stockPreorder->stockPreorderDetail()->createMany($data['dataDetail']);
        return $stockPreorder->refresh();
    }

    public function rollback($stockPreorderId)
    {
        $stockPreorder = self::getById($stockPreorderId);
        return $stockPreorder->stockPreorderDetail()->delete();
    }
}
