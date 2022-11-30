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
            $table->string('code')->nullable();
            $table->bigInteger('user_id');
            $table->enum('type',array('indoor','outdoor','lainnya'));
            $table->integer('merk_id');
            $table->string('location_name')->nullable();
            $table->string('location_address')->nullable();
            $table->string('location_latitude')->nullable();
            $table->string('location_longitude')->nullable();
            $table->text('description');
            $table->integer('price_total')->nullable();//100%   
            $table->integer('price_dp')->nullable();//30%
            $table->integer('price_paid_off')->nullable();//70%
            $table->integer('price_transport')->nullable();
            $table->text('other_cost')->nullable();
            $table->integer('status_id');
            $table->enum('service_type',array('pengecekan','perbaikan','instalasi'));
            $table->text('admin_description')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
