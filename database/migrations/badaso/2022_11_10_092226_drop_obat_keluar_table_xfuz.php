<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropObatkeluarTableXfuz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::dropIfExists('obat_keluar');

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
        Schema::create('obat_keluar', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->string('nama_pembeli', 200);
			$table->bigInteger('jumlah');
			$table->timestamps();
        });
    }
}
