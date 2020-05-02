<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameViewsToDownloads extends Migration
{
    public function up(): void
    {
        Schema::table('patches', function (Blueprint $table) {
            $table->renameColumn('views', 'downloads');
        });
    }

    public function down(): void
    {
        Schema::table('patches', function (Blueprint $table) {
            $table->renameColumn('downloads', 'views');
        });
    }
}
