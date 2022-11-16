<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterObatmasukTableEovc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('obat_masuk', function (Blueprint $table) {
            $table->dropForeign(['id_obat']);
        });

        Schema::table('obat_masuk', function (Blueprint $table) {
            $table->dropColumn('id_obat');
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


        Schema::table('obat_masuk', function (Blueprint $table) {
            $table->bigInteger('id_obat')->unsigned();
        });

        Schema::table('obat_masuk', function (Blueprint $table) {
            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('no action')->onUpdate('no action');
        });


    }
}
