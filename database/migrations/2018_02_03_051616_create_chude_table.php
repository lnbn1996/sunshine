<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chude', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->unsignedTinyInteger('cd_ma')->autoIncrement()->comment('chu de ma');
            $table->string('cd_ten',50)->comment('chu de ten');
            $table->timestamp('cd_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('chu de tao moi');
            $table->timestamp('cd_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('chu de cap nhat');
            $table->unsignedTinyInteger('cd_trangThai')->default('2')->comment('chu de trang thai');
            $table->unique('cd_ten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chude');
    }
}
