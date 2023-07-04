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
        Schema::create('lci_coins', function (Blueprint $table) {
            $table->id();
            $table->char('coin')->unique();
            $table->string('name');
            $table->float('usd_price',16,8)->nullable()->default(0.00000000);
            $table->boolean('DepositAllEnable')->nullable()->default(0);
            $table->boolean("is_supported")->default(0);
            $table->timestamp("last_price_update")->nullable();
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
        Schema::dropIfExists('lci_coins');
    }
};
