<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterObatTableDmxl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                    Schema::table('obat', function (Blueprint $table) {
            $table->dropForeign(['id_jenis_obat']);
        });

        Schema::table('obat', function (Blueprint $table) {
            $table->dropColumn('id_jenis_obat');
        });

        Schema::table('obat', function (Blueprint $table) {
            $table->bigInteger('stok')->charset('')->collation('')->change();
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


        Schema::table('obat', function (Blueprint $table) {
            $table->bigInteger('id_jenis_obat')->unsigned();
        });

        Schema::table('obat', function (Blueprint $table) {
            $table->bigInteger('stok')->charset('')->collation('')->change();
        });        Schema::table('obat', function (Blueprint $table) {
            $table->foreign('id_jenis_obat')->references('id')->on('jenis_obat')->onDelete('no action')->onUpdate('no action');
        });


    }
}
