<?php

namespace LifePHP\Core;

use LifePHP\Adapter\Eloquent;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{

    public function __construct() 
    {
        Eloquent::getInstance();
    }
    
}
