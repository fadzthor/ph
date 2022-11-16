<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class JenisObatCRUDDataDeleted extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     *
     * @throws Exception
     */
    public function run()
    {
      	\DB::beginTransaction();
       	try {
			$data_type = Badaso::model('DataType')->where('name', 'jenis_obat')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'jenis_obat')->delete();
            }

			Badaso::model('Permission')->removeFrom('jenis_obat');

			$menuItem = Badaso::model('MenuItem')::where('url', '/general/jenis-obat');

            if ($menuItem->exists()) {
                $menuItem->delete();
            }

			\DB::commit();
       	} catch(Exception $e) {
        	\DB::rollBack();

        	throw new Exception('Exception occur ' . $e);
       	}
    }
}
