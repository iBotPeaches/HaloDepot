<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCleanNameAndCustomDataToPatches extends Migration
{
    public function up(): void
    {
        Schema::table('patches', function (Blueprint $table) {
            $table->string('map', 128)->after('name')->default('');
            $table->json('data')->after('views');
        });
    }

    public function down(): void
    {
        Schema::table('patches', function (Blueprint $table) {
            $table->dropColumn('map');
            $table->dropColumn('data');
        });
    }
}
