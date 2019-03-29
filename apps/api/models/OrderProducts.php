<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class OrderProducts extends Eloquent
{
    protected $table = 'order_products';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];
}