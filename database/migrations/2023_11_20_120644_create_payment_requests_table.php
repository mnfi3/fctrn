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
        Schema::create('payment_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('payment_request_able_id')->nullable();
            $table->string('payment_request_able_type')->nullable();
            $table->string('bank_name')->nullable();
            $table->integer('amount')->nullable();
            $table->string('token')->nullable();
            $table->string('data')->nullable();
            $table->boolean('is_verified')->nullable()->default(0);
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
        Schema::dropIfExists('payment_requests');
    }
};
