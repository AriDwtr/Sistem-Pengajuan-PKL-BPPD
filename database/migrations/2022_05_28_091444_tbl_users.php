<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan');
            $table->string('nama_belakang')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->integer('id_instansi')->nullable();
            $table->string('status')->nullable();
            $table->text('foto')->nullable();
            $table->text('surat_rekom')->nullable();
            $table->text('surat_pengantar')->nullable();
            $table->text('proposal')->nullable();
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
        Schema::dropIfExists('users');
    }
}
