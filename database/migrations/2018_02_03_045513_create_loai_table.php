<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->unsignedTinyInteger('l_ma')->autoIncrement()->comment('loai ma');
            $table->string('l_ten',50)->comment('loai ten');
            $table->timestamp('l_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('loai tao moi');
            $table->timestamp('l_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('loai cap nhat');
            $table->unsignedTinyInteger('l_trangThai')->default('2')->comment('loai trang thai');
            $table->unique('l_ten');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai');
    }
}
