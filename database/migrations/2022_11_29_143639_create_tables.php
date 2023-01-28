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
        Schema::create('tastes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150);
            $table->text('description');;
            $table->timestamps();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 250);
            $table->timestamps();
        });
        Schema::create('confectioneries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 250);
            $table->double('price', 8, 2)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('Categories')->onDelete('cascade');
            $table->double('calories', 8, 2)->nullable();
            $table->double('fats', 8, 2)->nullable();
            $table->double('proteins', 8, 2)->nullable();
            $table->double('carbohydrates', 8, 2)->nullable();
            $table->integer('preparing_time')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::create('tastes_confectioneries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('taste_id');
            $table->foreign('taste_id')->references('id')->on('Tastes')->onDelete('cascade');
            $table->unsignedBigInteger('confectionery_id');
            $table->foreign('confectionery_id')->references('id')->on('Confectioneries')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('percent')->nullable()->default(0.05);
            $table->timestamps();
        });
        Schema::create('confectioneries_discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('confectionery_id');
            $table->foreign('confectionery_id')->references('id')->on('Confectioneries')->onDelete('cascade');
            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')->references('id')->on('Discounts')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path', 500);
            $table->string('alt_text')->nullable();
            $table->string('imageable_id');
            $table->string('imageable_type');
            $table->timestamps();
        });
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login', 15);
            $table->string('password', 20);
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->boolean('is_admin')->nullable()->default(false);
            $table->timestamps();
        });

        Schema::create('cake_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('price', 8, 2);
            $table->integer('componentable_id');
            $table->string('componentable_type');
            $table->timestamps();
        });
        Schema::create('sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        Schema::create('layers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        Schema::create('shapes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        Schema::create('flavours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        Schema::create('fillings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('components')->nullable();
            $table->timestamps();
        });
        Schema::create('glazes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        Schema::create('designs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->timestamps();
        });
        Schema::create('decorations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('amount')->unsigned()->default(1);
            $table->string('unit')->nullable();
            $table->timestamps();
        });
        Schema::create('toppings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->timestamps();
        });

        Schema::create('cake_builders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('layour_id');
            $table->unsignedBigInteger('shape_id');
            $table->unsignedBigInteger('flavour_id');
            $table->unsignedBigInteger('filling_id')->nullable();
            $table->unsignedBigInteger('glaze_id')->nullable();
            $table->unsignedBigInteger('design_id')->nullable();

            $table->string('inscription')->nullable();
            $table->text('add_info')->nullable();

            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('layour_id')->references('id')->on('layers')->onDelete('cascade');
            $table->foreign('shape_id')->references('id')->on('shapes')->onDelete('cascade');
            $table->foreign('flavour_id')->references('id')->on('flavours')->onDelete('cascade');
            $table->foreign('filling_id')->references('id')->on('fillings')->onDelete('cascade');
            $table->foreign('glaze_id')->references('id')->on('glazes')->onDelete('cascade');
            $table->foreign('design_id')->references('id')->on('designs')->onDelete('cascade');

            $table->timestamps();
        });
        Schema::create('cake_builder_decorations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cake_builder_id');
            $table->foreign('cake_builder_id')->references('id')->on('cake_builders')->onDelete('cascade');
            $table->unsignedBigInteger('decoration_id');
            $table->foreign('decoration_id')->references('id')->on('decorations')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('cake_builders_toppings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cake_builder_id');
            $table->foreign('cake_builder_id')->references('id')->on('cake_builders')->onDelete('cascade');
            $table->unsignedBigInteger('topping_id');
            $table->foreign('topping_id')->references('id')->on('toppings')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('order_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('color', 100);
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('orderable_id');
            $table->string('orderable_type');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('address');
            $table->string('phone');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('order_statuses')->onDelete('cascade');
            $table->text('add_info')->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->timestamps();
        });
        Schema::create('simple_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('confectionery_id');
            $table->foreign('confectionery_id')->references('id')->on('confectioneries')->onDelete('cascade');
            $table->integer('amount')->unsigned();
            $table->timestamps();
        });
        Schema::create('cake_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cake_builder_id');
            $table->foreign('cake_builder_id')->references('id')->on('cake_builders')->onDelete('cascade');
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
        Schema::drop('tastes');
        Schema::drop('categories');
        Schema::drop('confectioneries');
        Schema::drop('tastes_confectioneries');
        Schema::drop('discounts');
        Schema::drop('confectioneries_discounts');
        Schema::drop('images');
        Schema::drop('customers');
        Schema::drop('cake_components');
        Schema::drop('sizes');
        Schema::drop('layers');
        Schema::drop('shapes');
        Schema::drop('flavours');
        Schema::drop('fillings');
        Schema::drop('glazes');
        Schema::drop('designs');
        Schema::drop('decorations');
        Schema::drop('toppings');
        Schema::drop('cake_builders');
        Schema::drop('cake_builder_decorations');
        Schema::drop('cake_builders_toppings');
        Schema::drop('order_statuses');
        Schema::drop('orders');
        Schema::drop('simple_orders');
    }
};
