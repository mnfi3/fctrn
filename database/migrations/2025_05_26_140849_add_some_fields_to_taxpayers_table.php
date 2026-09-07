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
            $table->string('bank_account_number', 255)->nullable()->after('insert_number');
            $table->string('bank_shba_number', 255)->nullable()->after('bank_account_number');
            $table->string('bank_name', 255)->nullable()->after('bank_shba_number');
            $table->string('bank_account_name', 255)->nullable()->after('bank_name');
            $table->string('logo_image', 255)->nullable()->after('bank_account_name');
            $table->string('sign_image', 255)->nullable()->after('logo_image');
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
