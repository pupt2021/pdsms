<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentists', function (Blueprint $table) {
            $table->id();
            //banners
            $table->string('dentistbanner');
            $table->string('dentistbannertitle');
            //meet our experience dentist
            $table->string('titletext');
            $table->string('shortdesc');
            //staff 1
            $table->string('staff1image');
            $table->string('staff1name');
            $table->string('staff1position');
            $table->string('staff1desc');
            $table->string('staff1twitterlink')->nullable();
            $table->string('staff1fblink')->nullable();
            $table->string('staff1instalink')->nullable();
            $table->string('staff1gmail')->nullable();
            //staff 2
            $table->string('staff2image');
            $table->string('staff2name');
            $table->string('staff2position');
            $table->string('staff2desc');
            $table->string('staff2twitterlink')->nullable();
            $table->string('staff2fblink')->nullable();
            $table->string('staff2instalink')->nullable();
            $table->string('staff2gmail')->nullable();
           /* //staff 3
            $table->string('staff3image');
            $table->string('staff3name');
            $table->string('staff3position');
            $table->string('staff3desc');
            $table->string('staff3twitterlink')->nullable();
            $table->string('staff3fblink')->nullable();
            $table->string('staff3instalink')->nullable();
            $table->string('staff3gmail')->nullable();
            //staff 4
            $table->string('staff3image');
            $table->string('staff3name');
            $table->string('staff3position');
            $table->string('staff3desc');
            $table->string('staff3twitterlink')->nullable();
            $table->string('staff3fblink')->nullable();
            $table->string('staff3instalink')->nullable();
            $table->string('staff3gmail')->nullable();*/
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
        Schema::dropIfExists('dentists');
    }
}
