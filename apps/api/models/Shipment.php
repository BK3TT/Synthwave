<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Shipment extends Eloquent
{
    protected $table = 'shipment';
    protected $fillable = [
        'customer_id',
        'customer_address',
        'billing_address',
        'order_id',
        'order_price',
        'delivery_cost',
        'total_cost'
    ];
}