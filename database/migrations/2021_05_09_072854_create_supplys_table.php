<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplys', function (Blueprint $table) {
            $table->id();
            $table->string('supply_name');
            $table->string('picture');
            $table->string('quantity');
            $table->string('unit');
            $table->string('danger_level')->default(0);
            $table->date('date_received');
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
        Schema::dropIfExists('supplys');
    }
}
