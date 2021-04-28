<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStatusProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_produto', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
        });

        DB::table('status_produto')->insert(
            array(
                ['descricao' => "Disponível"],
                ['descricao' => "Vendido"],
                ['descricao' => "Sacolinha"],
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_produto');
    }
}
