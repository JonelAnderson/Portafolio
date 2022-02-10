<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('title', 40);
            $table->text('description');
            $table->string('website', 20);
            $table->string('degree', 30);
            $table->string('city', 30);
            $table->string('email', 20);
            $table->string('phone', 12);
            $table->string('freelance', 20);
            $table->timestamps();
        });
        DB::table('abouts')->insert([
            'id' => '1',
            'title' => 'Web Developer',
            'description' =>
                'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'website' => 'www.webdioner.com',
            'degree' => 'Ing. Infornatica y Sistemas',
            'city' => 'Tingo Maria - Perú',
            'email' => 'anderson@gmail.com',
            'phone' => '51927648348',
            'freelance' => 'Disponible',
        ]);
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
