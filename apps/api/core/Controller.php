<?php

class Controller 
{    
    public $data;

    public function model($model)
    {
        require_once MODELS . $model . '.php';
        return new $model();
    }
}