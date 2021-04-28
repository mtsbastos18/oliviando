<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->string('nome');
            $table->decimal('custo');
            $table->decimal('preco');
            $table->integer('quantidade');
            $table->decimal('largura')->nullable();
            $table->decimal('altura')->nullable();
            $table->decimal('profundidade')->nullable();
            $table->text('descricao')->nullable();
            $table->unsignedBigInteger('status_id')->default(1);
            $table->foreign('status_id')->references('id')->on('status_produto');
            $table->string('imagem')->nullable();
            $table->unsignedBigInteger('usuario_criacao');
            $table->foreign('usuario_criacao')->references('id')->on('users');
            $table->unsignedBigInteger('usuario_atualizacao')->nullable();
            $table->foreign('usuario_atualizacao')->references('id')->on('users');
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
        Schema::dropIfExists('produtos');
    }
}
