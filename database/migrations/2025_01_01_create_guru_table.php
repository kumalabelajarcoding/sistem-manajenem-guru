<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->string('nama'); // String
            $table->string('nip')->unique(); // String, Unique
            $table->string('mapel'); // String
            $table->string('nomor_hp'); // String
            $table->text('alamat'); // Text
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guru');
    }
};