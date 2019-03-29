<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Order extends Eloquent
{
    protected $table = 'order';
    protected $fillable = [
        'customer_id',
        'total_price',
        'status_id',
    ]; 
}