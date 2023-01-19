<?php

namespace cosnaWallet\PhpSdk;

use Exception;
use Illuminate\Support\Facades\Http;


class ConsaWallet
{

    public $header = [];

    public function __constructor(){

    }

    public function setKeys(string $private_key, string $master_key)
    {
        $this->header = array(
            'master-key' => $master_key,
            'private-key' => $private_key
        );
        return $this;
    }

    /**
     * @param array $array
     * @return bool|\Exception|string
     * @throws Exception
     */
    public function initPayment(array $array)
    {
        if (!array_key_exists('amount', $array)) throw new Exception('amount is not define');

        if (!array_key_exists('currency', $array)) throw new Exception('currency is not define');

        if (!array_key_exists('hash', $array)) throw new Exception('hash is not define');

        if($array['amount'] <= 200) throw new Exception("Error: amount must be greather than 200");

        if(!array_key_exists('return_url', $array)) throw new Exception("Error: return url not define");

        if(!array_key_exists('cancel_url', $array)) throw new Exception("Error: cancel url not define");

        if(!array_key_exists('callback_url', $array)) throw new Exception("Error: callback url not define");

        $response = Http::withHeaders($this->header)->post('https://api.staging.payment.cosna-afrique.com/v1/wallet/payment', $array);

        return json_decode($response->body());

    }

}