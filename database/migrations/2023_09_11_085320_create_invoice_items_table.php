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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('taxpayer_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->string('sstid')->nullable();
            $table->text('sstt')->nullable();
            $table->double('am', 20, 8, true)->nullable();
            $table->text('mu')->nullable();
            $table->double('nw', 20, 8, true)->nullable();
            $table->double('fee', 20, 8, true)->nullable();
            $table->double('cfee', 20, 4, true)->nullable();
            $table->text('cut')->nullable();
            $table->double('exr', 20, 2, true)->nullable();
            $table->double('ssrv', 20, 2, true)->nullable();
            $table->double('sscv', 20, 2, true)->nullable();
            $table->double('prdis', 20, 2, true)->nullable();
            $table->double('dis', 20, 2, true)->nullable();
            $table->double('adis', 20, 2, true)->nullable();
            $table->double('vra', 20, 2, true)->nullable();
            $table->double('vam', 20, 2, true)->nullable();
            $table->string('odt', 255)->nullable();
            $table->double('odr', 20, 2, true)->nullable();
            $table->double('odam', 20, 2, true)->nullable();
            $table->string('olt', 255)->nullable();
            $table->double('olr', 20, 2, true)->nullable();
            $table->double('olam', 20, 2, true)->nullable();
            $table->double('consfee', 20, 2, true)->nullable();
            $table->double('spro', 20, 2, true)->nullable();
            $table->double('bros', 20, 2, true)->nullable();
            $table->double('tcpbs', 20, 2, true)->nullable();
            $table->double('cop', 20, 2, true)->nullable();
            $table->double('vop', 20, 2, true)->nullable();
            $table->string('bsrn')->nullable();
            $table->double('tsstam', 20, 2, true)->nullable();
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
        Schema::dropIfExists('invoice_items');
    }
};
