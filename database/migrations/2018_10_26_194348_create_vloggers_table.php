<?php
/**
 * Bekende Vloggende Nederlanders
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateVloggersTable
 */
class CreateVloggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vloggers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();

            $table->timestamps();

            $table->index(['name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vloggers');
    }
}
