# Cosna wallet PHP Sdk

<p align="center">
  <a href="https://packagist.org/packages/loov/php-sdk">
    <img src="https://img.shields.io/packagist/dt/loov/php-sdk" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/loov/php-sdk">
    <img src="https://img.shields.io/packagist/v/loov/php-sdk" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/loov/php-sdk">
    <img src="https://img.shields.io/packagist/l/loov/php-sdk" alt="License">
  </a>
</p>

## Introduction

Cosna wallet is an online payment tools....

## Installation

Run this in your terminal to install cosna wallet from command line:

``` bash
composer require cosnaWallet/php-sdk
```
## Requirement

<table>
    <tr>
        <th>Varibale name</th>
        <th>Type</th>
        <th>Required</th>
    </tr>
    <tr>
        <td>amount</td>
        <td>number</td>
        <td>yes</td>
    </tr>
    <tr>
       <td>return_url</td>
       <td>string</td>
       <td>yes</td>
    </tr>
    <tr>
       <td>callback_url</td>
       <td>string</td>
       <td>yes</td>
    </tr>
    <tr>
       <td>cancel_url</td>
       <td>string</td>
       <td>yes</td>
    </tr>
    <tr>
       <td>master-key</td>
       <td>string</td>
       <td>yes</td>
    </tr>
    <tr>
       <td>private-key</td>
       <td>string</td>
       <td>yes</td>
    </tr>
    <tr>
       <td>hash</td>
       <td>string</td>
       <td>yes</td>
    </tr>
</table>

## Make a payment
```
<?php
namespace App\Http\Controllers;
use cosnaWallet\PhpSdk\Cosnawallet;

class payment extends Controller
{
    public function objet()
    {
        return new LoovPay('private_key', 'master_key');
    }

    public function index()
    {

        $data = array(
            'amount' => 2000,
            'currency' => '',
            'hash' => '',
            'return_url' => '',
            'cancel_url' => '',
            'callback_url' => '',
        );

        $this->objet()->initPayment($data);
    }


}


## License

The cosna wallet PHP SDK is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Security

If you discover any security related issues, please email randyahmedjunior@gmail.com instead of using the issue tracker.

It's _heavily_ recommended that you **[subscribe to the Loov Newsletter](http://loov-solutions.com)** so you can find out about any security updates, breaking changes or major features.
We send an email about 3-4 emails per year. Sometimes less.
