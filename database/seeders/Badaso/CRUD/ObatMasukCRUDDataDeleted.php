<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;

class ObatMasukCRUDDataDeleted extends Seeder
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
			$data_type = Badaso::model('DataType')->where('name', 'obat_masuk')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'obat_masuk')->delete();
            }

			Badaso::model('Permission')->removeFrom('obat_masuk');

			$menuItem = Badaso::model('MenuItem')::where('url', '/general/obat-masuk');

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
