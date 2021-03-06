<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->datetime('order_datetime');
            $table->enum('status', ['received', 'in_process', 'ready', 'on_the_way', 'delivered', 'canceled']);
            $table->enum('type', ['delivery', 'takeaway']);
            $table->enum('payment_method', ['cash', 'iDEAL']);
            $table->boolean('paid')->nullable();
            $table->string('mollie_payment_id')->nullable();
            $table->string('uuid');
            $table->bigInteger('contact_information_id')->unsigned();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('contact_information_id')->references('id')->on('contact_information')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
