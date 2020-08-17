<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseigner', function (Blueprint $table) {
            $table->string('jour');
            $table->string('interval');

            $table->integer('id_semestre')->nullable();
            $table->integer('id_salle')->nullable();
            $table->integer('id_matiere')->nullable();
            $table->integer('id_annee')->nullable();
            $table->integer('id_utilisateur')->nullable();

            $table->foreign('id_utilisateur')
            ->references('id_utilisateur')->on('utilisateur')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_semestre')
            ->references('id_semestre')->on('semestre')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_salle')
            ->references('id_salle')->on('salle')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_matiere')
            ->references('id_matiere')->on('matiere')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('id_annee')
            ->references('id_annee')->on('annee')
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
        Schema::dropIfExists('enseigner');
    }
}
