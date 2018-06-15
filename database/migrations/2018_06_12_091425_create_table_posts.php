<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->on('users')->onDelete('RESTRICT');
            $table->integer('category_id')->on('post_categories')->onDelete('RESTRICT');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('status');
            $table->string('img');
            $table->timestamp('published_at')->nullable();
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIfExists();
        });
    }
}
