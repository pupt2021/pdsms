<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->text('firstname');
            $table->text('middlename')->nullable();
            $table->text('lastname');
            $table->text('extensionname')->nullable();
            $table->string('picture')->nullable();
            $table->text('gender');
            $table->date('birthday');
            $table->string('email')->unique();
            $table->text('contactnumber');
            $table->text('streetnumber');
            $table->text('streetname');
            $table->text('brgy');
            $table->text('district');
            $table->text('city');
            $table->text('med_history')->nullable();
            $table->text('allergies')->nullable();
            $table->text('medication')->nullable();
            $table->text('others')->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
