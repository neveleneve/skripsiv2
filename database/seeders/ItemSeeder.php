<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Offer;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // example data
        // $item_id = $this->generateRandomString(10);
        $item_id = $this->generateRandomString(10);
        Item::insert([
            'item_id' => $item_id,
            'name' => 'Chevrolet Captiva 2013',
            'brand' => 3,
            'category' => 5,
            'tahun' => 2013,
            'open_bid' => 10000000,
            'buyitnow' => 230000000,
            'seller_id' => 2,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisl eros, pulvinar facilisis justo mollis, auctor consequat urna. Morbi a bibendum metus. Donec scelerisque sollicitudin enim eu venenatis. Duis tincidunt laoreet ex, in pretium orci vestibulum eget. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis pharetra luctus lacus ut vestibulum. Maecenas ipsum lacus, lacinia quis posuere ut, pulvinar vitae dolor. Integer eu nibh at nisi ullamcorper sagittis id vel leo. Integer feugiat faucibus libero, at maximus nisl suscipit posuere. Morbi nec enim nunc. Phasellus bibendum turpis ut ipsum egestas, sed sollicitudin elit convallis. Cras pharetra mi tristique sapien vestibulum lobortis. Nam eget bibendum metus, non dictum mauris. Nulla at tellus sagittis, viverra est a, bibendum metus.',
            'end_time' => date('Y-m-d 00:00:00', strtotime('+7 days')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        // $created_at = date('Y-m-d H:i:s');
        // $offer_code = [
        //     'previous_offer_code' => null,
        //     'id_penawar' => 3,
        //     'id_seller' => 2,
        //     'id_item' => $item_id,
        //     'offer_price' => '25000000',
        //     'offer_type' => 'bid',
        //     'created_at' => $created_at,
        // ];        
    }

    public function generateRandomString($length)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
