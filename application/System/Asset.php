<?php

namespace application\System;

use LifePHP\Core\Asset as CoreAsset;

/**
 * Class Asset
 * @package application\System
 */
class Asset extends CoreAsset 
{
    
    /**
     *
     * @var array
     */
    public $css = [
        '/plugins/get/css/bootstrap.min.css',
        '/plugins/multiple/sticky.css?v=0.1',
        '/css/styles.css',
    ];
    /**
     *
     * @var array 
     */
    public $js = [
        '/plugins/jquery/jquery-3.5.1.min.js',
        '/plugins/jquery/popper.min.js',
        '/plugins/get/js/bootstrap.min.js',
        '/plugins/multiple/bundle.min.js',
    ];

}
