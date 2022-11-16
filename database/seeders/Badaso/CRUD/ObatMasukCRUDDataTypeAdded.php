<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class ObatMasukCRUDDataTypeAdded extends Seeder
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

            \DB::table('badaso_data_types')->insert(array (
                'id' => 17,
                'name' => 'obat_masuk',
                'slug' => 'obat-masuk',
                'display_name_singular' => 'Obat Masuk',
                'display_name_plural' => 'Obat Masuk',
                'icon' => 'input',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\medin',
                'order_column' => NULL,
                'order_display_column' => NULL,
                'order_direction' => NULL,
                'generate_permissions' => true,
                'server_side' => false,
                'is_maintenance' => 0,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => false,
                'created_at' => '2022-11-11T04:34:23.000000Z',
                'updated_at' => '2022-11-15T06:50:59.000000Z',
            ));

            Badaso::model('Permission')->generateFor('obat_masuk');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/obat-masuk')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Obat Masuk',
                    'target' => '_self',
                    'icon_class' => 'input',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_obat_masuk',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/obat-masuk';
                $menu_item->title = 'Obat Masuk';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'input';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_obat_masuk';
                $menu_item->order = $order;
                $menu_item->save();
            }

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

           throw new Exception('Exception occur ' . $e);
        }
    }
}
