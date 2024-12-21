<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('syncs', function (Blueprint $table) {
            $table->string('occasion')->nullable()->after('workStatus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('syncs', function (Blueprint $table) {
            $table->dropColumn('occasion');
        });
    }
};
