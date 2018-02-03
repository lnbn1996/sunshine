<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanchuyen', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->tinyInteger('vc_ma')->unsigned()->autoIncrement()->comment('van chuyen ma');
            $table->string('vc_ten',200)->comment('van chuyen ten');
            $table->integer('vc_chiPhi')->default('0')->comment('van chuyen chi phi');
            $table->text('vc_dienGiai')->comment('van chuyen chi phi');
            $table->timestamp('vc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('van chuyen tao moi');
            $table->timestamp('vc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('van chuyen cap nhat');
            $table->unsignedTinyInteger('vc_trangThai')->default('2')->comment('van chuyen trang thai');
            $table->unique(['vc_ten']);


        });
        //DB::statement("ALTER TABLE `vanchuyen` comment 'bang van chuyen' ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vanchuyen');
    }
}
