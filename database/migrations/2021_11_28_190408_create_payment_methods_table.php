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
        Schema::create('lci_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->references('id')->on("wallets");
            $table->foreignId('network_id')->references('id')->on("coins_network");
            $table->foreignId('coin_id')->references('id')->on("coins");

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
        Schema::table('lci_payment_methods', function(Blueprint $table)
        {
            $table->dropForeign('lci_payment_methods_wallet_id_foreign');
            $table->dropForeign('lci_payment_methods_network_id_foreign');
            $table->dropForeign('lci_payment_methods_coin_id_foreign');
        });
        Schema::dropIfExists('lci_payment_methods');
    }
};
