<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigInteger('dh_ma')->unsigned()->autoIncrement()->comment('ma don hang');
            $table->unsignedBigInteger('kh_ma')->comment('kh ma');
            $table->dateTime('dh_thoiGianDatHang')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('thoi gian dat hang');
            $table->dateTime('dh_thoiNhanDatHang')->comment('thoi gian nhan hang');
            $table->string('dh_nguoiNhan',100)->comment('nguoi nhan hang');
            $table->string('dh_diaChi',250)->comment('dia chi nguoi nhan');
            $table->string('dh_dienThoai',11)->comment('so dt nguoi nhan');
            $table->string('dh_nguoiGui',100)->comment('nguoi gui hang');
            $table->text('dh_loiChuc')->nullable()->comment('loi chuc');
            $table->tinyInteger('dh_daThanhToan')->default('0')->comment('tinh trang thanh toan cua don hang');
            //?????
            $table->tinyInteger('nv_xuLy')->unsigned()->default('1')->comment('nhan vien xu ly');
            $table->dateTime('dh_ngayXuLy')->nullable();
            //?????
            $table->tinyInteger('nv_giaoHang')->unsigned()->default('1')->comment('nhan vien giao hang');
            $table->dateTime('dh_ngayLapPhieuGiao')->nullable()->comment('ngay lap phieu giao');
            $table->dateTime('dh_ngayGiaoHang')->nullable()->comment('ngay giao hang');
            $table->timestamp('dh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('dh tao moi');
            $table->timestamp('dh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('dh cap nhat');
            $table->unsignedTinyInteger('dh_trangThai')->default('1')->comment('dh trang thai');
            $table->tinyInteger('vc_ma')->unsigned()->comment('van chuyen ma');
            $table->unsignedTinyInteger('tt_ma')->comment('thanh toan ma');
            //khoa ngoai
            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_xuLy')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_giaoHang')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vc_ma')->references('vc_ma')->on('vanchuyen')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('donhang');
    }
}
