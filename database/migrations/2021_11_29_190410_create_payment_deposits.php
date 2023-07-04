<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lci_payment_deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->references('id')->on('payments');
            $table->foreignId('deposit_id')->references('id')->on('deposits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lci_payment_deposits', function(Blueprint $table)
        {
            $table->dropForeign('lci_deposits_payment_id_foreign');
            $table->dropForeign('lci_deposits_deposit_id_foreign');
        });
        Schema::dropIfExists('lci_payment_deposits');
    }
};
