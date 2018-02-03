<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieunhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhap', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //tao cot
            $table->bigInteger('pn_ma')->unsigned()->autoIncrement()->commnet('phieu nhap ma');
            $table->string('pn_nguoiGiao',100)->comment('nguoi giao pn');
            $table->string('pn_soHoaDon',15)->comment('so hoa don pn');
            $table->dateTime('pn_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngay xuat pn');
            $table->text('pn_ghiChu')->nullable()->comment('ghi chu pn');
            $table->tinyInteger('nv_nguoiLapPhieu')->unsigned()->comment('ma nhan vien lap pn');
            $table->dateTime('pn_ngayLapPhieu')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngay lap pn');
            $table->tinyInteger('nv_keToan')->unsigned()->default('1')->comment('ke toan');
            $table->dateTime('pn_ngayXacNhan')->nullable()->comment('ngay xac nhan');
            $table->tinyInteger('nv_thuKho')->unsigned()->default('1')->comment('thu kho');
            $table->dateTime('pn_ngayNhapKho')->nullable()->comment('ngay nhap kho');
            $table->timestamp('pn_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('pn tao moi');
            $table->timestamp('pn_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('pn cap nhat');
            $table->unsignedTinyInteger('pn_trangThai')->default('2')->comment('pn trang thai');
            $table->smallInteger('ncc_ma')->comment('ncc ma');

            $table->unique('pn_soHoaDon');  
            //tao khoa ngoai
            $table->foreign('nv_nguoiLapPhieu')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('nv_keToan')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_thuKho')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ncc_ma')->references('ncc_ma')->on('nhacungcap')->onDelete('cascade')->onUpdate('cascade');            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieunhap');
    }
}
