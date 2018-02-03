<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->unsignedTinyInteger('m_ma')->autoIncrement()->comment('mau ma');
            $table->string('m_ten',50)->comment('mau ten');
            $table->timestamp('m_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('mau tao moi');
            $table->timestamp('m_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('mau cap nhat');
            $table->unsignedTinyInteger('m_trangThai')->default('2')->comment('mau trang thai');
            $table->unique('m_ten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mau');
    }
}
