<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxpayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxpayers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->text('type')->nullable();
            $table->text('name')->nullable();
            $table->text('national_id')->nullable();
            $table->text('postal_code')->nullable();
            $table->text('economic_code')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('username')->nullable();
            $table->text('private_key')->nullable();
            $table->text('public_key')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxpayers');
    }
}
