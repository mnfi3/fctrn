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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('taxpayer_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->string('status')->nullable();
            $table->string('username')->nullable();
            $table->text('private_key')->nullable();
            $table->longText('send_response')->nullable();
            $table->longText('verify_response')->nullable();
            $table->longText('send_error')->nullable();
            $table->longText('verify_error')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->string('number')->nullable();
            $table->string('uid')->nullable();
            $table->string('refrence_number')->nullable();
            $table->string('taxid')->nullable();
            $table->string('indatim')->nullable();
            $table->string('indati2m')->nullable();
            $table->string('inty')->nullable();
            $table->string('inno')->nullable();
            $table->string('irtaxid')->nullable();
            $table->string('inp')->nullable();
            $table->string('ins')->nullable();
            $table->string('tins')->nullable();
            $table->string('tob')->nullable();
            $table->string('bid')->nullable();
            $table->string('tinb')->nullable();
            $table->string('sbc')->nullable();
            $table->string('bpc')->nullable();
            $table->string('bbc')->nullable();
            $table->string('ft')->nullable();
            $table->string('bpn')->nullable();
            $table->string('scln')->nullable();
            $table->string('scc')->nullable();
            $table->string('cdcn')->nullable();
            $table->string('cdcd')->nullable();
            $table->string('crn')->nullable();
            $table->string('billid')->nullable();
            $table->double('tprdis', 20, 2, true)->nullable();
            $table->double('tdis', 20, 2, true)->nullable();
            $table->double('tadis', 20, 2, true)->nullable();
            $table->double('tvam', 20, 2, true)->nullable();
            $table->double('todam', 20, 2, true)->nullable();
            $table->double('tbill', 20, 2, true)->nullable();
            $table->double('tonw', 20, 2, true)->nullable();
            $table->double('torv', 20, 2, true)->nullable();
            $table->double('tocv', 20, 2, true)->nullable();
            $table->string('setm')->nullable();
            $table->double('cap', 20, 2, true)->nullable();
            $table->double('insp', 20, 2, true)->nullable();
            $table->double('tvop', 20, 2, true)->nullable();
            $table->double('tax17', 20, 2, true)->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
