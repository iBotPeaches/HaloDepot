<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToPatch extends Migration
{
    public function up(): void
    {
        Schema::table('patches', function (Blueprint $table) {
            $table->string('slug', 128)->unique()->after('hash')->nullable(false);
        });
    }

    public function down(): void
    {
        Schema::table('patches', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
