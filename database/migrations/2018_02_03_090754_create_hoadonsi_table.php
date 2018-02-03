<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonsi', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigInteger('hds_ma')->autoIncrement()->comment('ma hds');
            $table->string('hds_nguoiMuaHang',100)->comment('nguoi mua si');
            $table->string('hds_tenDonVi',200)->comment('don vi mua');
            $table->string('hds_diaChi',250)->comment('dia chi mua');
            $table->string('hds_maSoThue',14)->comment('ma so thue');
            $table->string('hds_soTaiKhoan',20)->nullable()->comment('ma so thue');
            $table->tinyInteger('nv_lapHoaDon')->unsigned()->comment('ma nhan vien lap hd');
            $table->dateTime('hds_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngay xuat hd');
            $table->tinyInteger('hds_thuTruong')->unsigned()->default('1')->comment('thu truong');
            $table->timestamp('hds_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('hds tao moi');
            $table->timestamp('hds_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('hds cap nhat');
            $table->unsignedTinyInteger('hds_trangThai')->default('1')->comment('hds trang thai');
            $table->bigInteger('dh_ma')->unsigned()->default('1')->comment('ma don hang');
            $table->unsignedTinyInteger('tt_ma')->comment('thanh toan ma');
            //
            $table->foreign('nv_lapHoaDon')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('hds_thuTruong')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dh_ma')->references('dh_ma')->on('donhang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tt_ma')->references('tt_ma')->on('thanhtoan')->onDelete('cascade')->onUpdate('cascade'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadonsi');
    }
}
