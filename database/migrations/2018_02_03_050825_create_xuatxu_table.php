<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXuatxuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuatxu', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->smallInteger('xx_ma')->autoIncrement()->comment('xx ma');
            $table->string('xx_ten',100)->comment('xx ten');
            $table->timestamp('xx_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('xx tao moi');
            $table->timestamp('xx_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('xx cap nhat');
            $table->unsignedTinyInteger('xx_trangThai')->default('2')->comment('xx trang thai');
            $table->unique('xx_ten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuatxu');
    }
}
