<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToDepartementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departement', function (Blueprint $table) {

            $table->integer('id_utilisateur');

            $table->foreign('id_utilisateur')
            ->references('id_utilisateur')->on('utilisateur')
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
        Schema::table('departement', function (Blueprint $table) {
            $table->dropForeign('departement_id_utilisateur_foreign');
            $table->dropColumn(['id_utilisateur']);
        });
    }
}
