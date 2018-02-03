<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoandonle', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigInteger('hdl_ma')->comment('ma hoa don le');
            $table->string('hdl_nguoiMuaHang',100)->comment('nguoi mua hang');
            $table->string('hdl_dienThoai',11)->comment(' sdt mua le');
            $table->string('hdl_diaChi',250)->comment('dia chi mua le');
            $table->tinyInteger('nv_lapHoaDon')->unsigned()->comment('ma nhan vien lap hd');
            $table->dateTime('hdl_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngay xuat hdl');
            $table->bigInteger('dh_ma')->unsigned()->default('1')->comment('ma don hang');

            $table->foreign('nv_lapHoaDon')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('dh_ma')->references('dh_ma')->on('donhang')->onDelete('cascade')->onUpdate('cascade');        



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoandonle');
    }
}
