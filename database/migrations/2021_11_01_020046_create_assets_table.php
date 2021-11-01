<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            //foreign key
            $table->integer('user_id')->nullable();
            $table->string('label')->nullable();
            //foreign key
            $table->integer('asset_type_id')->nullable();
            $table->string('asset_serial')->nullable();
            $table->dateTime('register_date')->nullable();
            //foreign key`
            $table->integer('asset_status_id')->nullable();
            $table->date('expired_date')->nullable();
            $table->string('image')->nullable();
            //foreign key
            $table->integer('current_owned_by')->nullable();
            //foreign key
            $table->integer('location_id')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
