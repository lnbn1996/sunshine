<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //tao cac bang
            $table->tinyInteger('nv_ma')->unsigned()->autoIncrement()->comment('ma nhan vien');
            $table->string('nv_taiKhoan',50)->comment('tai khoan nhan vien');
            $table->string('nv_matKhau',32)->comment('mat khau nhan vien');
            $table->string('nv_hoTen',100)->comment('ho ten nhan vien');
            $table->unsignedTinyInteger('nv_gioiTinh')->default('1')->comment('nv gioi tinh');
            $table->string('nv_email',100)->comment('nv email');
            $table->datetime('nv_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('nv ngay sinh');
            $table->string('nv_diaChi',250)->comment('nv dia chi');
            $table->string('nv_dienThoai',11)->comment('nv dien thoai');
            $table->timestamp('nv_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('nv tao moi');
            $table->timestamp('nv_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('nv cap nhat');
            $table->unsignedTinyInteger('nv_trangThai')->default('2')->comment('nv trang thai');
            $table->unsignedTinyInteger('q_ma')->comment('quyen ma');
            $table->unique(['nv_taiKhoan','nv_email','nv_dienThoai']);
            $table->foreign('q_ma')->references('q_ma')->on('quyen')->onDelete('cascade')->onUpdate('cascade');              

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
