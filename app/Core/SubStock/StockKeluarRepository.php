<?php namespace App\Core\SubStock;

use App\Models\Penjualan\Penjualan;

class StockKeluarRepository
{
    protected $data;
    protected $dataDetail;
    protected $class;

    public static function kode($kondisi)
    {
        return null;
    }

    public function getData()
    {
        return $this->class->stockKeluar()->first();
    }

    public function store()
    {
        $stockKeluar = $this->class->stockKeluar()->create($this->data);
        $stockKeluar->stockKeluarDetail()->createMany($this->setDetail());
        return $stockKeluar->refresh();
    }

    protected function setDetail()
    {
        $data = [];
        foreach ($this->dataDetail as $dataDetail)
        {
            $data[] = [
                'produk_id'=>$dataDetail->produk_id,
                'jumlah'=>$dataDetail->jumlah,
            ];
            // update stock inventory
            (new StockInventoryRepository(
                $this->data['gudang_id'],
                $this->data['kondisi'],
                $dataDetail->produk_id,
                $dataDetail->jumlah
            ))->stockKeluar();
        }
        return $data;
    }

    public function update()
    {
        $stockKeluar = self::getData();
        $stockKeluar->update($this->data);
        $stockKeluar->stockKeluarDetail()->createMany($this->setDetail());
        return $stockKeluar->refresh();
    }

    public function rollback()
    {
        $stockKeluar = self::getData();
        // rollback stock inventory keluar
        foreach ($stockKeluar->stockKeluarDetail as $item) {
            (new StockInventoryRepository(
                $stockKeluar->gudang_id,
                $stockKeluar->kondisi,
                $item->produk_id,
                $item->jumlah
            ))->rollbackStockKeluar();
        }
        return $stockKeluar->stockKeluarDetail()->delete();
    }
}
