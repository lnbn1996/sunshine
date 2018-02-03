<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhacungcap', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->smallInteger('ncc_ma')->autoIncrement()->comment('ncc ma');
            $table->string('ncc_ten',200)->comment('ncc ten');
            $table->string('ncc_daiDien',100)->comment('ncc dai dien');
            $table->string('ncc_diaChi',250)->comment('ncc dia chi');
            $table->string('ncc_dienThoai',11)->comment('ncc dien thoai');
            $table->string('ncc_email',100)->comment('ncc email');
            $table->timestamp('ncc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ncc tao moi');
            $table->timestamp('ncc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('ncc cap nhat');
            $table->unsignedTinyInteger('ncc_trangThai')->default('2')->comment('ncc trang thai');
            $table->smallInteger('xx_ma')->comment('xx ma');
            $table->unique('ncc_ten');
            $table->foreign('xx_ma')->references('xx_ma')->on('xuatxu')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhacungcap');
    }
}
