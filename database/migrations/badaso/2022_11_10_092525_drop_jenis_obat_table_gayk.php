<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropJenisobatTableGayk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::dropIfExists('jenis_obat');

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
        Schema::create('jenis_obat', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->string('nama', 200);
			$table->timestamps();
			$table->softDeletes();
        });
    }
}
