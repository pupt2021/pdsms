<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplyStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplys_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('current_stock')->default(0);
            $table->string('consumed')->default(0);
            $table->string('total')->default(0);
            //$table->foreignId('service_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supply_stocks');
    }
}
