<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->String("nis")->unique();
            $table->String("nisn");
            $table->integer("idjalurmasuk");
            $table->integer("idjurusan");
            $table->String("nmlengkap");
            $table->String("nmjurusan");
            $table->String("nik");
            $table->enum('jk', ['L', 'P']);
            $table->String("email");
            $table->timestamps();
            $table->integer("iduser");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
