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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('user_id')->comment('사용자아이디');
			$table->string('wr_name')->comment('작성자이름');
			$table->string('subject')->default('')->comment('제목');
			$table->longText('contents')->comment('게시물 내용');
			$table->string('cate_id')->comment('카테고리 아이디');
			$table->enum('options',['Notice','html1','html2'])->comment('옵션');
			$table->bigInteger('hits')->default('0')->nullable()->comment('조회수');
			$table->bigInteger('like')->default('0')->nullable()->comment('좋아요');
			$table->bigInteger('unlike')->default('0')->nullable()->comment('안좋아요');
            $table->timestamps();
			$table->softDeletes();
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
};
