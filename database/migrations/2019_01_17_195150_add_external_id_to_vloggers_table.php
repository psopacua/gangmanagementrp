<?php
/**
 * Bekende Vloggende Nederlanders
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class AddExternalIdToVloggersTable
 */
class AddExternalIdToVloggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vloggers', function (Blueprint $table) {
            $table->string('external_id', 255)
                  ->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vloggers', function (Blueprint $table) {
            $table->dropColumn('external_id');
        });
    }
}
