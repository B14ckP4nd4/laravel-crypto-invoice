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
        Schema::create('lci_coins_network', function (Blueprint $table) {
            $table->id();
            $table->string('network');
            $table->string('name');
            $table->foreignId('coin_id')->constrained('coins')->references('id')->cascadeOnDelete();
            $table->boolean('is_default')->default(0);
            $table->boolean('deposit_enable')->default(0);
            $table->text('deposit_desc')->nullable();
            $table->text('special_tips')->nullable();
            $table->boolean('resetAddress')->default(1);
            $table->string("contract_address")->nullable();
            $table->integer('token_id')->nullable();
            $table->integer('min_confirm')->default(1);
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
        Schema::table('lci_coins_network', function(Blueprint $table)
        {
            $table->dropForeign('lci_coins_network_coin_id_foreign');
        });
        Schema::dropIfExists('lci_coins_network');
    }
};
