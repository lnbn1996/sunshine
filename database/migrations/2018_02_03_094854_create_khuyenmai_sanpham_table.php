<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai_sanpham', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //tao cot
            $table->tinyInteger('km_ma')->unsigned()->comment('ma kmai');
            $table->unsignedBigInteger('sp_ma')->comment('san pham ma');
            $table->unsignedTinyInteger('m_ma')->comment('mau ma');

            $table->string('kmsp_giaTri',50)->default('100;100')->comment('gia tri spkm');
            $table->tinyInteger('kmsp_trangThai')->default('2')->comment('tt sp km');
            //toa khoa ngoai
            $table->foreign('km_ma')->references('km_ma')->on('khuyenmai')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('m_ma')->references('m_ma')->on('mau')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyenmai_sanpham');
    }
}
