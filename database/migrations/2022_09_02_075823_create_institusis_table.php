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
        Schema::create('institusis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_institusi', 200);
            $table->string('nama_pimpinan', 100);
            $table->char('province_id', 2);
            $table->char('regencie_id', 4);
            $table->char('district_id', 7);
            $table->char('village_id', 10);
            $table->foreignId('user_id', 10);
            $table->string('telepon', 20);
            $table->text('logo');
            $table->string('website', 200);
            $table->string('email', 100);
            $table->string('password', 200);
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
        Schema::dropIfExists('institusis');
    }
};
