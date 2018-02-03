<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->unsignedTinyInteger('q_ma')->autoIncrement()->comment('quyen ma');
            $table->string('q_ten',30)->comment('quyen ten');
            $table->text('q_dienGiai',250)->comment('quyen chi phi');
            $table->timestamp('q_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('quyen tao moi');
            $table->timestamp('q_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('quyen cap nhat');
            $table->unsignedTinyInteger('q_trangThai')->default('2')->comment('quyen trang thai');
            $table->unique('q_ten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyen');
    }
}
