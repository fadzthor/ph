<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class JenisObatCRUDDataTypeAdded extends Seeder
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

            \DB::table('badaso_data_types')->insert(array (
                'id' => 12,
                'name' => 'jenis_obat',
                'slug' => 'jenis-obat',
                'display_name_singular' => 'Jenis Obat',
                'display_name_plural' => 'Jenis Obat',
                'icon' => 'category',
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
                'created_at' => '2022-11-11T03:33:53.000000Z',
                'updated_at' => '2022-11-15T06:53:33.000000Z',
            ));

            Badaso::model('Permission')->generateFor('jenis_obat');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/jenis-obat')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Jenis Obat',
                    'target' => '_self',
                    'icon_class' => 'category',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_jenis_obat',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/jenis-obat';
                $menu_item->title = 'Jenis Obat';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'category';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_jenis_obat';
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
