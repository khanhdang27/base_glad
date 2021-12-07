<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('member_id');
            $table->string('member_name')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->double('total_price')->default(0);
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->string('coupon_name')->nullable();
            $table->double('coupon_discount')->nullable();
            $table->double('amount')->default(0);
            $table->smallInteger('status')->default(1);
            $table->unsignedBigInteger('creator_id');
            $table->string('creator_name');
            $table->unsignedBigInteger('payment_method_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('orders');
    }
}
