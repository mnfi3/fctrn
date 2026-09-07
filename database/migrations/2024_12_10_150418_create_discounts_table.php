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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('code', 100)->nullable();
            $table->string('discount_type', 100)->nullable();
            $table->float('amount', 100)->nullable();
            $table->float('percent')->nullable();
            $table->date('expired_at')->nullable();
            $table->integer('count')->nullable();
            $table->integer('remain')->nullable();
            $table->text('users')->nullable();
            $table->integer('used')->nullable()->default(0);
            $table->string('type')->nullable()->default(0);
            $table->text('description')->nullable()->default(0);
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
        Schema::dropIfExists('discounts');
    }
};
