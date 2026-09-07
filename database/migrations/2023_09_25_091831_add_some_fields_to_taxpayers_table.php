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
        Schema::table('taxpayers', function (Blueprint $table) {
            $table->string('state')->nullable()->after('public_key');
            $table->string('city')->nullable()->after('state');
            $table->string('fax')->nullable()->after('city');
            $table->string('insert_number')->nullable()->after('fax');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('taxpayers', function (Blueprint $table) {
            //
        });
    }
};
