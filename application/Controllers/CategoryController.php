<?php


namespace application\Controllers;

use application\Models\Category;
use application\System\FrontendController;
use application\System\Rules;
use LifePHP\Core\Response;

/**
 * Class CategoryController
 * @package application\Controllers
 */
class CategoryController extends FrontendController
{
    public function readsAction()
    {
        $categorys = Category::SelectAllCategory();

        $this->view->set([
            'title' => 'Категории',
            'categorys' => $categorys
        ]);

        $this->view->render('views');
    }

    public function insertAction()
    {
        $post = $this->request->post;

        if(!empty($post)){
            if((new Rules($post))->checkInsertCategory() == false){
                $model = new Category();
                $model->InsertCategory($post['name']);
                Response::redirect('/categorys.htm');
            }
        }

        $this->view->render('view');
    }

    public function updateAction()
    {
        $post = $this->request->post;

        if(!empty($post)){
            if((new Rules($post))->checkUpdateCategory() == false){
                $model = new Category();
                $model->UpdateCategory($post['id'], $post['name']);
                Response::redirect('/categorys.htm');
            }
        }
    }
}