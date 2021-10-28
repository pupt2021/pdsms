<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('aboutbanner');
            $table->string('vmgpicture');
            $table->string('visiontitle');
            $table->string('visionprgph1',500);
            $table->string('visionprgph2',500)->nullable();
            $table->string('missiontitle');
            $table->string('missionprgph1', 500);
            $table->string('missionprgph2',500)->nullable();
            $table->string('goaltitle');
            $table->string('goalprgph1',500);
            $table->string('goalprgph2',500)->nullable();
            $table->string('picture');
            $table->string('maintitle');
            $table->string('maintitledescription');
            $table->string('weddesc');
            $table->string('cfdescription');
            $table->string('ccdesc');
            $table->string('achievementbg');
            $table->string('happydesc');
            $table->string('achievementdesc');
            $table->string('yearsofexp');
            $table->string('hscustomer');
            $table->string('patientsperyear');
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
        Schema::dropIfExists('abouts');
    }
}
