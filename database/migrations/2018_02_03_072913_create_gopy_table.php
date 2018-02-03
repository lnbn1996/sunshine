<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gopy', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->bigInteger('gy_ma')->unsigned()->autoIncrement()->comment('gop y ma');
            $table->dateTime('gy_thoiGian')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('tgian gy');
            $table->text('gy_noiDung')->comment('gop y noi dung');
            $table->unsignedBigInteger('kh_ma')->comment('kh ma');
            $table->unsignedBigInteger('sp_ma')->comment('san pham ma');
            $table->tinyInteger('gy_trangThai')->default('3')->comment('trang thai gop y');

            $table->foreign('kh_ma')->references('kh_ma')->on('khachhang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')->onDelete('cascade')->onUpdate('cascade');                                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gopy');
    }
}
