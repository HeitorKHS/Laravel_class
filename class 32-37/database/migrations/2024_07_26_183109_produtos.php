<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->double('preco', 10, 2);
            $table->string('slug');
            $table->string('imagem')->nullable();

            $table->unsignedBigInteger('id_user'); //Coluna da chave estrangeiro 
            //configuração da chave estrangeira
            //onDelete e onUpdate é pra quando um usuario for deletado os produtos ligados a ele tambem sera
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps(); //vai criar duas colunas com a data da criação e a ultima data de atualização do registro
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
