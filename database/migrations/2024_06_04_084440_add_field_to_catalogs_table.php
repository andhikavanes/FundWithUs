<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogs', function (Blueprint $table) {
            if (!Schema::hasColumn('catalogs', 'id_campaign')) {
                $table->unsignedBigInteger('id_campaign')->nullable()->after('id');
            }

            if (!Schema::hasColumn('catalogs', 'id_category')) {
                $table->unsignedBigInteger('id_category')->nullable();
            }

            if (!Schema::hasColumn('catalogs', 'image')) {
                $table->string('image')->nullable(false);
            }

            if (!Schema::hasColumn('catalogs', 'current_donation')) {
                $table->decimal('current_donation', 8, 2)->nullable();
            }

            // Drop existing foreign key if it exists
            $table->dropForeign(['id_campaign']);

            // Add the foreign key constraint
            $table->foreign('id_campaign', 'catalogs_id_campaign_foreign')
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
            if (Schema::hasColumn('catalogs', 'id_campaign')) {
                $table->dropForeign(['id_campaign']);
            }

            // Dropping the columns if they exist
            if (Schema::hasColumn('catalogs', 'id_campaign')) {
                $table->dropColumn('id_campaign');
            }

            if (Schema::hasColumn('catalogs', 'id_category')) {
                $table->dropColumn('id_category');
            }

            if (Schema::hasColumn('catalogs', 'image')) {
                $table->dropColumn('image');
            }

            if (Schema::hasColumn('catalogs', 'current_donation')) {
                $table->dropColumn('current_donation');
            }
        });
    }
}
