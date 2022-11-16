<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropObatmasukTablePrhq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::dropIfExists('obat_masuk');

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
        Schema::create('obat_masuk', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->string('distributor', 200);
			$table->bigInteger('jumlah');
			$table->timestamps();
			$table->date('tanggal_masuk');
        });
    }
}
