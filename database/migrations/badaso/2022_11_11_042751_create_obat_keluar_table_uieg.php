<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObatkeluarTableUieg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::create('obat_keluar', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->bigInteger('id_obat')->unsigned();
			$table->string('pembeli', 255);
			$table->bigInteger('jumlah');
			$table->timestamps();
        });

        Schema::table('obat_keluar', function (Blueprint $table) {
            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('restrict')->onUpdate('no action');
        });

        } catch (PDOException $ex) {
            $this->down();
            throw $ex;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat_keluar');
    }
}
