<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function initPaymentGateway()
    {
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }

    protected function checkOrderStatus($id_penjual, $id_item, $order_id = null)
    {
        if ($order_id === null) {
            # code...
        } else {
            # code...
        }
    }
    public function test()
    {
        echo $this->generateRandomString(10);
    }
    /**
     * Generate random string
     * @param string $length This is a length of string to function should generate.
     * If inputed value is a minus, it will bw absoluted of inputted negative value.
     * @param integer $type This is a type of string to function should generate.
     * Default = 0.
     * Value 0 = all alphabet (uppercase and lowercase) and number.
     * Value 1 = alphabet uppercase only.
     * Value 2 = alphabet lowercase only.
     * Value 3 = number only.
     * Value 4 = all alphabet (uppercase and lowercase).
     * Value 5 = alphabet uppercase and number.
     * Value 6 = alphabet lowercase and number.
     * Value more than 6 or less than 0 = value back to default.
     * @return string Result of generated random string
     *
     */
    protected function generateRandomString($length, $type = 0)
    {
        switch ($type) {
            case 0:
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 1:
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 2:
                $characters = 'abcdefghijklmnopqrstuvwxyz';
                break;
            case 3:
                $characters = '0123456789';
                break;
            case 4:
                $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 5:
                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 6:
                $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
                break;
            default:
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
        }
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < abs($length); $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
