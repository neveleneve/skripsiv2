<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_bids', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('item_id');
            $table->string('order_id');
            $table->string('payment_url');
            // order status means
            // initiate => user has insert their offer price on item page. if its done, they directly go to payment page to do payment.
            // payment => user is doing their payment to the product, system will check if payment is done by API from 3rd party payment gateway.
            // done => user has done their payment to the product, checking by 3rd party payment gateway.
            $table->enum('status', ['initiate', 'payment', 'done', 'cancel']);
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
        Schema::dropIfExists('join_bids');
    }
}
