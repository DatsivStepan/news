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
        Schema::table('file', function (Blueprint $table) {
            if (!Schema::hasColumn('file', 'path_medium')) {
                $table->string('path_medium')->nullable()->after('path');
            }

            if (!Schema::hasColumn('file', 'path_small')) {
                $table->string('path_small')->nullable()->after('path_medium');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('file', function (Blueprint $table) {
            //
        });
    }
};
