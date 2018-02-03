<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //tao cot
            $table->tinyInteger('km_ma')->unsigned()->autoIncrement()->comment('ma kmai');
            $table->string('kh_ten',200)->comment('ten km');
            $table->text('km_noiDung')->comment('noi dung km');
            $table->dateTime('km_batDau')->commnet('bat dau km');
            $table->dateTime('km_ketThuc')->comment('ket thuc km');
            $table->string('km_giaTri',50)->default('100;100')->comment('gia tri km');
            $table->tinyInteger('nv_nguoiLap')->unsigned()->comment('ma nhan vien lap');
            $table->dateTime('km_ngayLap')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ngay lap');
            $table->tinyInteger('nv_kyNhay')->unsigned()->default('1')->comment('ky nhay');
            $table->dateTime('km_ngayKyNhay')->nullable()->comment('ngay ky nhay');
            $table->tinyInteger('nv_kyDuyet')->unsigned()->default('1')->comment('ky duyet');
            $table->dateTime('km_ngayKyDuyet')->nullable()->comment('ngay ky duyet');
            $table->timestamp('km_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('km tao moi');
            $table->timestamp('km_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('km cap nhat');
            $table->unsignedTinyInteger('km_trangThai')->default('2')->comment('km trang thai');
            //tao khoa ngoai
            $table->foreign('nv_nguoiLap')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('nv_KyNhay')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_KyDuyet')->references('nv_ma')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');     

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyenmai');
    }
}
