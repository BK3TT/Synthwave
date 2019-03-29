<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Customer extends Eloquent
{
    protected $table = 'customer';
    protected $fillable = [
        'firstname',
        'surname',
        'email',
        'house',
        'address',
        'address2',
        'city',
        'postcode'
    ];
}