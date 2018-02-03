<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->unsignedBigInteger('sp_ma')->autoIncrement()->comment('san pham ma');
            $table->string('sp_ten',200)->comment('sp ten');
            $table->integer('sp_giaGoc')->default('0')->comment('sp gia goc');
            $table->integer('sp_giaBan')->default('0')->comment('sp gia ban');
            $table->string('sp_hinh',200)->comment('sp hinh');
            $table->text('sp_thongTin')->cooment('san pham thong tin');
            $table->string('sp_danhGia',50)->comment('sp danh gia');
            $table->timestamp('sp_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('san pham tao moi');
            $table->timestamp('sp_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('san pham cap nhat');
            $table->tinyInteger('sp_trangThai')->default('2')->comment('san pham trang thai'); 
            $table->unsignedTinyInteger('l_ma')->comment('loai ma');
            $table->unique('sp_ten');
            $table->foreign('l_ma')->references('l_ma')->on('loai')->onDelete('cascade')->onUpdate('cascade');  
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
