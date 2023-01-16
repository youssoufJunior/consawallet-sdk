<?php

namespace cosnaWallet\PhpSdk;

class Cosnawallet
{

    public $header = [];

    public function __constructor(){

    }

    public function setKeys(string $app_key, string $merchant_key)
    {
        $this->header = array(
            'master-key' => $merchant_key,
            'private-key' => $app_key
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

        $response = Http::withHeaders($this->header)->post('http://api.v2.cosna.test/v1/wallet/payment', $array);

        return json_decode($response->body());

    }

}