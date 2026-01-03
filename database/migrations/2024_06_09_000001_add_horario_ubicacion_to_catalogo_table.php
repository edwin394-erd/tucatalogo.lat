<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHorarioUbicacionToCatalogoTable extends Migration
{
    public function up()
    {
        Schema::table('catalogos', function (Blueprint $table) {
            $table->string('horario')->nullable()->after('description');
            $table->string('ubicacion')->nullable()->after('horario');
        });
    }

    public function down()
    {
        Schema::table('catalogos', function (Blueprint $table) {
            $table->dropColumn(['horario', 'ubicacion']);
        });
    }
}
