<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('thumb_url');
            $table->string('title');
            $table->string('content');
            $table->unsignedBigInteger('user_id');            
            $table->unsignedBigInteger('role_id');            
            $table->enum('status',['approved','pending','rejected']);                        
            $table->boolean('display');
            $table->unsignedInteger('viewer_count');
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
        Schema::dropIfExists('posts');
    }
}
