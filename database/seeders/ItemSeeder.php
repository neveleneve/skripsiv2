<?php

namespace Database\Seeders;

use App\Models\Item;
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
        Item::insert([
            [
                'item_id' => $this->generateRandomString(10),
                'name' => 'Chevrolet Captiva 2013',
                'brand' => 3,
                'category' => 5,
                'tahun' => 2013,
                'open_bid' => 10000000,
                'buyitnow' => 230000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_id' => $this->generateRandomString(10),
                'name' => 'Chevrolet Captiva 2013',
                'brand' => 3,
                'category' => 5,
                'tahun' => 2013,
                'open_bid' => 10000000,
                'buyitnow' => 230000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_id' => $this->generateRandomString(10),
                'name' => 'Chevrolet Captiva 2013',
                'brand' => 3,
                'category' => 5,
                'tahun' => 2013,
                'open_bid' => 10000000,
                'buyitnow' => 230000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_id' => $this->generateRandomString(10),
                'name' => 'Chevrolet Captiva 2013',
                'brand' => 3,
                'category' => 5,
                'tahun' => 2013,
                'open_bid' => 10000000,
                'buyitnow' => 230000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_id' => $this->generateRandomString(10),
                'name' => 'Chevrolet Captiva 2013',
                'brand' => 3,
                'category' => 5,
                'tahun' => 2013,
                'open_bid' => 10000000,
                'buyitnow' => 230000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'item_id' => $this->generateRandomString(10),
                'name' => 'Chevrolet Captiva 2013',
                'brand' => 3,
                'category' => 5,
                'tahun' => 2013,
                'open_bid' => 10000000,
                'buyitnow' => 230000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
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
