<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Traits\Seedable;

class BadasoDeploymentOrchestratorSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = 'database/seeders/Badaso/CRUD/';

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        
        
        
        
        
        
        
        
        $this->seed(ObatKeluarCRUDDataDeleted::class);
        $this->seed(ObatMasukCRUDDataDeleted::class);
        $this->seed(ObatCRUDDataDeleted::class);
        $this->seed(JenisObatCRUDDataDeleted::class);
        
        
        
        
        
        
        
        
        
        
        $this->seed(FoodCategoriesCRUDDataTypeAdded::class);
        $this->seed(FoodCategoriesCRUDDataRowAdded::class);
        $this->seed(FoodsCRUDDataTypeAdded::class);
        $this->seed(FoodsCRUDDataRowAdded::class);
        $this->seed(JenisObatCRUDDataTypeAdded::class);
        $this->seed(JenisObatCRUDDataRowAdded::class);
        
        
        
        
        
        
        $this->seed(DaftarObatCRUDDataDeleted::class);
        
        
        $this->seed(ObatMasukCRUDDataTypeAdded::class);
        $this->seed(ObatMasukCRUDDataRowAdded::class);
        $this->seed(ObatKeluarCRUDDataTypeAdded::class);
        $this->seed(ObatKeluarCRUDDataRowAdded::class);
        $this->seed(ObatCRUDDataTypeAdded::class);
        $this->seed(ObatCRUDDataRowAdded::class);
    }
}
