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
        Schema::create('commandes', function (Blueprint $collection) {
            $collection->id();
            $collection->string('cartId');
            $collection->string('ClientId');
            $collection->string('title');
            $collection->float('quantity');
            $collection->float('total');
            $collection->string('adress');
            $collection->string('note');
            $collection->string('status');
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
};
