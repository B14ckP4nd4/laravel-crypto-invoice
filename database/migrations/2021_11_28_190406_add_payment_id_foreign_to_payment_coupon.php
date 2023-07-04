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
        Schema::table('lci_payment_coupon', function (Blueprint $table) {
            $table->foreignId('payment_id')->after('coupon_id')->references("id")->on('payments');
            $table->unique( [ 'payment_id', 'coupon_id' ] );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
