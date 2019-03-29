<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Invoices extends Eloquent
{
    protected $table = 'invoices';
    protected $fillable = [
        'reference',
        'order_id',
        'quantity',
        'total'
    ];
}