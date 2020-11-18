<?php

namespace application\Controllers;

use application\System\FrontendController;

class IndexController extends FrontendController
{

    public function indexAction() 
    {
        $this->view->set([
            'title' => 'Главная страница',
        ]);

        $this->view->render('index');
    }

}
