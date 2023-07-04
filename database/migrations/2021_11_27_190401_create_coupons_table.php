<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lci_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('uses')->unsigned()->nullable();
            $table->integer('max_uses')->unsigned()->nullable();
            $table->integer('max_uses_user')->unsigned()->nullable();
            $table->string('couponable');
            $table->integer('discount_amount');
            $table->boolean('is_fixed')->default(true);
            $table->timestamp('starts_at', $precision = 0);
            $table->timestamp('expired_at', $precision = 0)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
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
        Schema::dropIfExists('lci_coupons');
    }
};
