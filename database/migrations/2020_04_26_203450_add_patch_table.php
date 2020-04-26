<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatchTable extends Migration
{
    public function up(): void
    {
        Schema::create('patches', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('game', false, true);
            $table->tinyInteger('patch', false, true);
            $table->string('hash', 128);
            $table->string('name');
            $table->string('author');
            $table->text('description');

            $table->string('image_path');
            $table->string('file_path');

            $table->integer('views')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patches');
    }
}
