<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilesizeToPatches extends Migration
{
    public function up(): void
    {
        Schema::table('patches', function (Blueprint $table) {
            $table->integer('filesize')->after('downloads')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('patches', function (Blueprint $table) {
            $table->dropColumn('filesize');
        });
    }
}
