<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigInteger('dh_ma')->unsigned()->comment('ma don hang');
            $table->unsignedBigInteger('sp_ma')->comment('san pham ma');
            $table->unsignedTinyInteger('m_ma')->comment('mau ma');
            $table->smallInteger('cthd_soLuong')->default('1')->commnet('so luong ctdh');
            $table->integer('ctdh_donGia')->default('1')->comment('chi tiet don gia');
            //
            $table->foreign('dh_ma')->references('dh_ma')->on('donhang')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('chitietdonhang');
    }
}
