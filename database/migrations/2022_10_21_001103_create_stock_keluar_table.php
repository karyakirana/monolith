<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('active_cash');
            $table->string('kode');
            $table->string('stockable_keluar_type')->nullable();
            $table->unsignedBigInteger('stockable_keluar_id')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('kondisi');
            $table->unsignedBigInteger('gudang_id');
            $table->date('tgl_keluar');
            $table->unsignedBigInteger('user_id');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_keluar_table');
    }
};
