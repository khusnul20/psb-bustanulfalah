<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('no_pend');
            $table->integer('nisn');
            $table->string('name');
            $table->date('tanggalLahir');
            $table->string('tempatLahir');
            $table->string('anakKe');
            $table->string('jumlahSaudara');
            $table->string('image');
            $table->string('foto_kk');
            $table->enum('jenisKelamin', ['L', 'P']);
            $table->string('nameAyah');
            $table->enum('pekerjaanAyah', ['Wirasuasta', 'Buruh', 'Peternak', 'Petani', 'Sopir', 'Lainnya']);
            $table->enum('penghasilanAyah', ['1000.000-2000.000', '2000.000-4000.000', '4000.000-6000.000', '6000.000-8000.000', '8000.000-10.000.000']);
            $table->string('noAyah');
            $table->string('alamatAyah');
            $table->string('nameIbu');
            $table->enum('pekerjaanIbu', ['Wirasuasta', 'Petani', 'TKW', 'IRT', 'Penjahit', 'Lainnya']);
            $table->enum('penghasilanIbu', ['1000.000-2000.000', '2000.000-4000.000', '4000.000-6000.000', '6000.000-8000.000', '8000.000-10.000.000']);
            $table->string('noIbu');
            $table->string('alamatIbu');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
