<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietnhap', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //tao cot
            $table->bigInteger('pn_ma')->unsigned()->commnet('phieu nhap ma');
            $table->unsignedBigInteger('sp_ma')->comment('san pham ma');
            $table->unsignedTinyInteger('m_ma')->comment('mau ma');
            $table->smallInteger('ctn_soLuong')->default('1')->comment('ctn so luong');
            $table->integer('ctn_donGia')->default('1')->comment('ctn don gia');
            //tao khoa ngoai
            $table->foreign('pn_ma')->references('pn_ma')->on('phieunhap')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('chitietnhap');
    }
}
