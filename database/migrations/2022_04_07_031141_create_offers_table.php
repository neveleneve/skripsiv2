<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer_code');
            $table->integer('id_penawar');
            $table->integer('id_seller');
            $table->string('id_item');
            $table->integer('offer_price');
            $table->string('payment_url');
            // order status means
            // bid => this type is for transaction of bidding offer
            // buy => this type is for transaction of direct buy offer
            $table->enum('offer_type', ['bid', 'buy']);
            // order status means
            // initiate => user has insert their offer price on item page. if its done, they directly go to payment page to do payment.
            // payment => user is doing their payment to the product, system will check if payment is done by API from 3rd party payment gateway.
            // done => user has done their payment to the product, checking by 3rd party payment gateway.
            $table->enum('order_status', ['initiate', 'payment', 'done', 'cancel']);
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
        Schema::dropIfExists('offers');
    }
}
