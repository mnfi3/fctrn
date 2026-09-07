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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('paymentable_id')->nullable();
            $table->string('paymentable_type')->nullable();
            $table->string('bank_name')->nullable();
            $table->integer('amount')->nullable();
            $table->string('receipt')->nullable();
            $table->text('data')->nullable();
            $table->boolean('is_success')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
