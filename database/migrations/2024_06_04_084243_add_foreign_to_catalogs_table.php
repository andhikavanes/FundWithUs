<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogs', function (Blueprint $table) {
            // Adding the column first
            $table->unsignedBigInteger('id_campaign')->after('id');

            // Adding the foreign key constraint
            $table->foreign('id_campaign')
                  ->references('id')
                  ->on('campaigns')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catalogs', function (Blueprint $table) {
            // Dropping the foreign key constraint
            $table->dropForeign(['id_campaign']);

            // Dropping the column
            $table->dropColumn('id_campaign');
        });
    }
}
