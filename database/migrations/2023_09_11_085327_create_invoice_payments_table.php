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
        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('taxpayer_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->string('iinn')->nullable();
            $table->string('acn')->nullable();
            $table->string('trmn')->nullable();
            $table->string('pmt')->nullable();
            $table->string('trn')->nullable();
            $table->string('pcn')->nullable();
            $table->string('pid')->nullable();
            $table->string('pdt')->nullable();
            $table->double('pv', 20, 2)->nullable();
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
        Schema::dropIfExists('invoice_payments');
    }
};
