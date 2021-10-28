<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('banner1');
            $table->string('banneronetitle');
            $table->string('banneronedescription');
            $table->string('banner2');
            $table->string('bannertwotitle');
            $table->string('bannertwodescription');
            $table->string('banner3');
            $table->string('bannerthreetitle');
            $table->string('bannerthreedescription');
            $table->string('gallerydesc');
            $table->string('picture1');
            $table->string('picture2');
            $table->string('picture3');
            $table->string('picture4');
            $table->string('contactdesc');
            $table->string('systemtitle');
            $table->string('systemdescription');
            $table->string('dentaltwitterlink')->nullable();
            $table->string('dentalfblink')->nullable();
            $table->string('dentalinstalink')->nullable();
            $table->string('dentaladdress');
            $table->string('dentalphone');
            $table->string('dentalemail');
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
        Schema::dropIfExists('homes');
    }
}
