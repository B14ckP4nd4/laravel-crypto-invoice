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
        Schema::create('lci_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->morphs('orderable');
            $table->text("description")->nullable();
            $table->float('amount',16,4)->default(0.0000);
            $table->float('discount',16,4)->default(0.0000);
            $table->float('qty',16,8)->default(0.00000000);
            $table->timestamp('due_date')->nullable();
            $table->string('tracking_code')->unique();
            $table->enum('status',['created','pending','expired','completed','failed'])->nullable();

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
        Schema::table('lci_payments', function(Blueprint $table)
        {
            $table->dropForeign('lci_payments_user_id_foreign');
            $table->dropForeign('lci_payments_payment_method_id_foreign');
        });
        Schema::dropIfExists('lci_payments');
    }
};
