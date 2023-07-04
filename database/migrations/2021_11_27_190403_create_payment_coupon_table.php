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
        Schema::create('lci_payment_coupon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coupon_id')->references('id')->on('coupons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lci_payment_coupon', function(Blueprint $table)
        {
            $table->dropForeign('lci_order_coupon_user_id_foreign');
            $table->dropForeign('lci_order_coupon_payment_id_foreign');
        });
        Schema::dropIfExists('lci_payment_coupon');
    }
};
