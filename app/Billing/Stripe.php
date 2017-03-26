<?php
/**
 * Created by PhpStorm.
 * User: polodev
 * Date: 3/26/17
 * Time: 10:17 PM
 */
namespace App\Billing;
class Stripe {
    protected $key;
    public function __construct($key) {
        $this->key = $key;
    }
}