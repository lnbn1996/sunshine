<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMauSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_sanpham', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->unsignedBigInteger('sp_ma')->comment('san pham ma');
            $table->unsignedTinyInteger('m_ma')->comment('mau ma');
            $table->smallInteger('msp_soLuong')->default(0)->comment('mau san pham so luong');

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
        Schema::dropIfExists('mau_sanpham');
    }
}
