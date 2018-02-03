<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->unsignedTinyInteger('tt_ma')->autoIncrement()->comment('thanh toan ma');
            $table->string('tt_ten',200)->comment('thanh toan ten');
            $table->text('tt_dienGiai')->comment('thanh toan dien giai');
            $table->timestamp('tt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('thanh toan tao moi');
            $table->timestamp('tt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('thanh toan cap nhat');
            $table->unsignedTinyInteger('vc_trangThai')->default('2')->comment('thanh toan trang thai');
            $table->unique(['tt_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanhtoan');
    }
}
