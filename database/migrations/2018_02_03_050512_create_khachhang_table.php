<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->unsignedBigInteger('kh_ma')->autoIncrement()->comment('kh ma');
            $table->string('kh_taiKhoan',50)->comment('kh tai khoan');
            $table->string('kh_matKhau',32)->comment('kh mat khau');
            $table->string('kh_hoTen',100)->comment('kh ho ten');
            $table->unsignedTinyInteger('kh_gioiTinh')->default('1')->comment('kh gioi tinh');
            $table->string('kh_email',100)->comment('kh email');
            $table->datetime('kh_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('kh ngay sinh');
            $table->string('kh_diaChi',250)->nullable()->comment('kh dia chi');
            $table->string('kh_dienThoai',11)->nullable()->comment('kh dien thoai');
            $table->timestamp('kh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('kh tao moi');
            $table->timestamp('kh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('kh cap nhat');
            $table->unsignedTinyInteger('kh_trangThai')->default('3')->comment('kh trang thai');
            $table->unique(['kh_taiKhoan','kh_email','kh_dienThoai']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
