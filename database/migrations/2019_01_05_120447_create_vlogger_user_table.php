<?php
/**
 * Bekende Vloggende Nederlanders
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVloggerUserTable
 */
class CreateVloggerUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlogger_user', function (Blueprint $table) {
            $table->integer('vlogger_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->tinyInteger('order');

            $table->foreign('vlogger_id')
                  ->references('id')
                  ->on('vloggers')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vlogger_user');
    }
}
