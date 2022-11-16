<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class ObatCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'obat')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'obat')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 19,
                'name' => 'obat',
                'slug' => 'obat',
                'display_name_singular' => 'Obat',
                'display_name_plural' => 'Obat',
                'icon' => 'list',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => NULL,
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
                'created_at' => '2022-11-15T07:49:42.000000Z',
                'updated_at' => '2022-11-15T07:51:47.000000Z',
            ));

            Badaso::model('Permission')->generateFor('obat');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/obat')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Obat',
                    'target' => '_self',
                    'icon_class' => 'list',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_obat',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/obat';
                $menu_item->title = 'Obat';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'list';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_obat';
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
