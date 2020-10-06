<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('mainurl')->nullable();
            $table->string('email')->nullable();
            $table->text('description', 65535)->nullable();
            $table->string('logo')->nullable();
            $table->string('link')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobilephone')->nullable();
            $table->string('ctitle1')->nullable();
            $table->string('calttitle1')->nullable();
            $table->string('ctitle2')->nullable();
            $table->string('calttitle2')->nullable();
            $table->string('ctitle3')->nullable();
            $table->string('calttitle3')->nullable();
            $table->string('ctitle4')->nullable();
            $table->string('calttitle4')->nullable();
            $table->string('ctitle5')->nullable();
            $table->string('calttitle5')->nullable();
            $table->string('ctitle6')->nullable();
            $table->string('calttitle6')->nullable();
            $table->string('facebook')->nullable();
            $table->float('lat', 20, 10);
            $table->float('lng', 20, 10);
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
        Schema::drop('settings');
    }

}
