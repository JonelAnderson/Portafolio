<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('nombre', 30);
            $table->string('descripcion');
            $table->string('imagen');
            $table->timestamps();
        });
        DB::table('homes')->insert([
            'id' => '1',
            'nombre' => 'Anderson',
            'descripcion' => 'Portafolio web',
            'imagen' => 'foto.jpg',
        ]);
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
