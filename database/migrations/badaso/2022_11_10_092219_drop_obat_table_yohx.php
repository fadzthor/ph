<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropObatTableYohx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::dropIfExists('obat');

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
        Schema::create('obat', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->string('nama_obat', 200);
			$table->bigInteger('stok');
			$table->timestamps();
        });
    }
}
