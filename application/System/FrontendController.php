<?php

namespace application\System;

use LifePHP\Core\Controller;
use application\System\Asset;

/**
 * Class FrontendController
 * @package application\System
 */
class FrontendController extends Controller 
{
    
    /**
     *
     * @var Asset 
     */
    public $assets;

    /**
     * FrontendController constructor.
     */
    public function __construct() 
    {
        $this->assets = new Asset(); 
    }
    
}
