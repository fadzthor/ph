<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class ObatKeluarCRUDDataTypeAdded extends Seeder
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

            $data_type = Badaso::model('DataType')->where('name', 'obat_keluar')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'obat_keluar')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 18,
                'name' => 'obat_keluar',
                'slug' => 'obat-keluar',
                'display_name_singular' => 'Obat Keluar',
                'display_name_plural' => 'Obat Keluar',
                'icon' => 'exit_to_app',
                'model_name' => NULL,
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\medout',
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
                'created_at' => '2022-11-11T04:35:54.000000Z',
                'updated_at' => '2022-11-15T07:19:38.000000Z',
            ));

            Badaso::model('Permission')->generateFor('obat_keluar');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/obat-keluar')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Obat Keluar',
                    'target' => '_self',
                    'icon_class' => 'exit_to_app',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_obat_keluar',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/obat-keluar';
                $menu_item->title = 'Obat Keluar';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'exit_to_app';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_obat_keluar';
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
