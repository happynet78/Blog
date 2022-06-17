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
        Schema::create('post_files', function (Blueprint $table) {
            $table->id();
			$table->integer('post_idx')->comment('포스트 인덱스');
			$table->string('file_name')->comment('파일 원본명');
			$table->string('file_type')->comment('파일 타입');
			$table->string('file_size')->comment('파일 용량');
			$table->string('file_rename')->comment('파일 수정명');
			$table->string('img_width')->default('')->nullable()->comment('이미지 파일 가로');
			$table->string('img_height')->default('')->nullable()->comment('이미지 파일 세로');
			$table->enum('opt', ['main', 'sub', 'front'])->default('sub')->comment('파일 옵션');
			$table->bigInteger('down_cnt')->default('0')->nullable()->comment('다운로드 회수');
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
        Schema::dropIfExists('post_files');
    }
};
