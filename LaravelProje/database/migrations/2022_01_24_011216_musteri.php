<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Musteri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Musteri', function (Blueprint $table) {

          $table->id();
          $table->integer("firma_id");
          $table->string("tc");
          $table->string("ad");
          $table->string("soyad");
            $table->date("date");
          $table->string("mail");
          $table->string("telefon");
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
        Schema::dropIfExists('Musteri');
    }
}
