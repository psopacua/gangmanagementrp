<?php
/**
 * Bekende Vloggende Nederlanders
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVideosTable
 */
class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('video_id');
            $table->integer('views');

            $table->integer('vlogger_id')->unsigned();

            $table->timestamps();

            $table->index(['title', 'vlogger_id']);

            $table->foreign('vlogger_id')->references('id')
                                                 ->on('vloggers')
                                                 ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
