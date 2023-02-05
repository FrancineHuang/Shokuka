<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_steps', function (Blueprint $table) {
            //中間テーブルを実装する
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('step_id');

            //Foreign Keyを実装し、二つのテーブルを紐つける
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('step_id')->references('id')->on('steps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_steps');
    }
};
