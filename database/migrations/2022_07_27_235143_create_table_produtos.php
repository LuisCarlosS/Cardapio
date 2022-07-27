<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id_produto');

            $table->string('nome_produto', 150);
            $table->string('preco', 30);
            $table->string('foto', 50);
            $table->text('descricao_produto', 400);
            $table->string('situacao', 20);

            $table->integer('categoria_id')->unsigned();

            $table->foreign("categoria_id")
                ->references("id_categoria")
                ->on("categorias");
            

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
