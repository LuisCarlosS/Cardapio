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
            $table->increments('id');

            $table->string('nome_produto', 50);
            $table->string('preco', 30);
            $table->string('foto', 50);
            $table->text('descricao_produto', 180);
            $table->string('situacao', 1);

            $table->integer('categoria_id')->unsigned();

            $table->foreign("categoria_id")
                ->references("id")
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
