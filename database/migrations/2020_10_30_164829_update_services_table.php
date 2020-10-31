<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('location');
            $table->integer('price');
            $table->integer('size');
            $table->integer('bedrooms');
            $table->integer('toilets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['location']);
            $table->dropColumn(['price']);
            $table->dropColumn(['size']);
            $table->dropColumn(['bedrooms']);
            $table->dropColumn(['toilets']);
        });
    }
}
