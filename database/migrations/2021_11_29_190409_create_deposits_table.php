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
        Schema::create('lci_deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('coin_id')->nullable()->references('id')->on('coins');
            $table->foreignId('wallet_id')->references('id')->on('wallets');
            $table->timestamp('insert_time')->nullable();
            $table->float('amount',16,8);
            $table->float('to_usd',16,4)->nullable();
            $table->text('hash')->unique()->nullable();
            $table->text('from');
            $table->text('tag')->nullable();
            $table->text('note')->nullable();
            $table->unsignedInteger('confirms')->default(0);
            $table->enum('status',['un-confirmed','on-process','confirmed','rejected'])->default('un-confirmed');
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
        Schema::table('lci_deposits', function(Blueprint $table)
        {
            $table->dropForeign('lci_deposits_user_id_foreign');
            $table->dropForeign('lci_deposits_network_id_foreign');
            $table->dropForeign('lci_deposits_coin_id_foreign');
            $table->dropForeign('lci_deposits_wallet_id_foreign');
        });
        Schema::dropIfExists('lci_deposits');
    }
};
