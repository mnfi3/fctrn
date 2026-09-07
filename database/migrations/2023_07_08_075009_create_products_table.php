<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('taxTpStoPartCode')->nullable();
            $table->text('type')->nullable();
            $table->date('date')->nullable();
            $table->text('specialOrGeneral')->nullable();
            $table->text('taxableOrFree')->nullable();
            $table->integer('vat')->nullable();
            $table->text('vatCustomPurposes')->nullable();
            $table->text('descriptionOfId')->nullable();
            $table->text('countingUnit')->nullable();
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
        Schema::dropIfExists('products');
    }
}
