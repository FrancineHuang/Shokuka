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
        Schema::create('followers', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->unsignedBigInteger('follower_id');
            $table->foreign('follower_id')->references('id')->on('users'); //外部キー制約
            $table->unsignedBigInteger('followee_id');
            $table->foreign('followee_id')->references('id')->on('users'); //外部キー制約
            // timestampと書いてしまうと、レコード挿入時、更新時に値が入らないので、DB::rawで直接書いています
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes(); //論理削除を定義→deleted_atを自動生成
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
};
