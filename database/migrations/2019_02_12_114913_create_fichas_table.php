<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('pacientes_id')->unsigned();
            $table->foreign('pacientes_id')->references('id')->on('pacientes');
            $table->boolean('finalizado');
            $table->integer('doenca_bases_id')->unsigned();
            $table->foreign('doenca_bases_id')->references('id')->on('doenca_bases');
            $table->integer('transfusaos_id')->unsigned();
            $table->foreign('transfusaos_id')->references('id')->on('transfusaos');
            $table->integer('gravidades_id')->unsigned();
            $table->foreign('gravidades_id')->references('id')->on('gravidades');
            $table->timestamp('data_reacao');
            $table->text('descricao');
            $table->char('pre_medicacao', 255);
            $table->char('reacao_adversa', 255);
            $table->text('indicacao');
            $table->integer('tipos_imediatas_id')->unsigned();
            $table->foreign('tipos_imediatas_id')->references('id')->on('tipos_imediatas');
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
        Schema::dropIfExists('fichas');
    }
}
