<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscrireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscrire', function (Blueprint $table) {
            $table->integer('id_annee');
            $table->integer('id_utilisateur');
            $table->integer('id_licence');
            $table->date('date_inscription')->nullable();

            $table->foreign('id_annee')
            ->references('id_annee')->on('annee')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_utilisateur')
            ->references('id_utilisateur')->on('utilisateur')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_licence')
            ->references('id_licence')->on('licence')
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
        Schema::dropIfExists('inscrire');
    }
}
