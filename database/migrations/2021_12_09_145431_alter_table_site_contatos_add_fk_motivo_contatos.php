<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function(Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id')->after('email');
        });

        // Atribuindo os dados de motivo_contato para motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        // Criando fk e removendo a coluna motivo_contato
        Schema::table('site_contatos', function(Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Cria a coluna motivo_contato e removendo a fk
        Schema::table('site_contatos', function(Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        // Atribuindo motivo_contatos_id para a coluna motivo_contato
        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
