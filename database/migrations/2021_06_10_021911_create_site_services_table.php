<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_services', function (Blueprint $table) {
            $table->id();
            $table->string('servicebanner');
            $table->string('servicebannertitle');
            $table->string('servicetitle');
            $table->string('servicedescription');
            $table->string('twdesc');
            $table->string('tcdesc');
            $table->string('qbdesc');
            $table->string('madesc');
            $table->string('dcdesc');
            $table->string('didesc');
            $table->string('tbdesc');
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
        Schema::dropIfExists('site_services');
    }
}
