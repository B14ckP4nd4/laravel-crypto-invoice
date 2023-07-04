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
        Schema::create('lci_user_coupon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('coupon_id')->references('id')->on('coupons');
            $table->unique( [ 'user_id', 'coupon_id' ] );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lci_user_coupon', function(Blueprint $table)
        {
            $table->dropForeign('lci_user_coupon_user_id_foreign');
            $table->dropForeign('lci_user_coupon_coupon_id_foreign');
        });
        Schema::dropIfExists('lci_user_coupon');
    }
};
