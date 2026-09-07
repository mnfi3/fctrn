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
        Schema::create('csrs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('type')->nullable();
            $table->text('company_name')->nullable();
            $table->text('company_english_name')->nullable();
            $table->text('national_id')->nullable();
            $table->text('mobile')->nullable();
            $table->text('email')->nullable();
            $table->text('private')->nullable();
            $table->text('public')->nullable();
            $table->text('csr')->nullable();
            $table->text('x509')->nullable();
            $table->text('file')->nullable();
            $table->text('errors')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csrs');
    }
};
