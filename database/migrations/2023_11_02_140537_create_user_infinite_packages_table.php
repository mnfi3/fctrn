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
        Schema::create('user_infinite_packages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('taxpayer_id')->nullable();
            $table->integer('cost')->nullable();
            $table->dateTime('from_date')->nullable();
            $table->dateTime('to_date')->nullable();
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
        Schema::dropIfExists('user_infinite_packages');
    }
};
