<?php

return [
    'name' => 'ProffPress',
    'siteName' => 'LifePHP',
    'version' => '0.0.1',
    'basePath' => dirname(__DIR__),
    'backendUrl' => '',
    'routes' => [
        '/robots.txt' => 'site/robots',        
        '/sitemap.xml' => 'site/sitemap',        
        '/books.htm' => 'book/reads',
        '/book/:num.htm' => 'book/read/$1',
        '/book/action/create.htm' => 'book/insert',
        '/book/action/update/:num.htm' => 'book/update/$1',
        '/book/action/delete/:num.htm' => 'book/delete/$1',

        '/categorys.htm' => 'category/reads',
        '/category/action/create.htm' => 'category/insert',
        '/category/action/update/:num.htm' => 'category/update/$1',
    ],   
];
