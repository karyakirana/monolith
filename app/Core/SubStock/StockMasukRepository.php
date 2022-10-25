<?php namespace App\Core\SubStock;

class StockMasukRepository
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
        return $this->class->stockMasuk()->first();
    }

    public function store()
    {
        $stockMasuk = $this->class->stockMasuk()->create($this->data);
        $stockMasuk->stockMasukDetail()->createMany($this->setDetail());
        return $stockMasuk->refresh();
    }

    protected function setDetail()
    {
        $data = [];
        foreach ($this->dataDetail as $item) {
            $data[] = [
                'produk_id'=>$item->produk_id,
                'jumlah'=>$item->jumlah,
            ];
            // update stock inventory
            (new StockInventoryRepository(
                $this->data['gudang_id'],
                $this->data['kondisi'],
                $item->produk_id,
                $item->jumlah
            ))->stockMasuk();
        }
        return $data;
    }

    public function update()
    {
        $stockMasuk = $this->getData();
        $stockMasuk->update($this->data);
        $stockMasuk->stockMasukDetail()->createMany($this->setDetail());
        return $stockMasuk->refresh();
    }

    public function rollback()
    {
        $stockMasuk = $this->getData();
        // rollback stock inventory masuk
        foreach ($stockMasuk->stockMasukDetail as $item) {
            (new StockInventoryRepository(
                $stockMasuk->gudang_id,
                $stockMasuk->kondisi,
                $item->produk_id,
                $item->jumlah
            ))->rollbackStockMasuk();
        }
        return $stockMasuk->stockMasukDetail()->delete();
    }
}
