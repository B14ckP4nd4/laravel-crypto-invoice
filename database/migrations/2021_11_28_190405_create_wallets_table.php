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
        Schema::create('lci_wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->references('id');
            $table->string('network');
            $table->text('address');
            $table->text('private_key')->nullable();
            $table->string('tag')->nullable();
            $table->string('url')->nullable();
            $table->string('address_qr')->nullable();
            $table->string('tag_qr')->nullable();
            $table->timestamps();

            $table->unique(['address','tag'],'address_tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lci_wallets', function(Blueprint $table)
        {
            $table->dropForeign('lci_wallets_user_id_foreign');
        });
        Schema::dropIfExists('lci_wallets');
    }
};
