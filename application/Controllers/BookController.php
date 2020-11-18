<?php

namespace application\Controllers;

use application\Models\Category;
use application\System\FrontendController;
use application\Models\Book;
use application\System\Rules;
use LifePHP\Core\Response;
use LifePHP\Core\Request;

/**
 * Class BookController
 * @package application\Controllers
 */
class BookController extends FrontendController
{
    /**
     * BookController constructor.
     */
    public function __construct() 
    {
        parent::__construct();        
    }

    /**
     * @param $id
     */
    public  function readAction($id)
    {
        $book = Book::SelectBook($id);
        $book['category'] = $this->unserializeCategory($book['category']);
        $categorys = Category::SelectAllCategory();
        $this->view->set([
            'title' => 'Книга',
            'read' => true,
            'book' => $book,
            'categorys' => $categorys
        ]);
        $this->view->render('view');
    }

    public function readsAction()
    {
        $books = Book::SelectAllBook();
        $categorys = Category::SelectAllCategory();
        foreach($books as $key => $items){
            $books[$key]['category'] = $this->unserializeCategory($books[$key]['category']);
        }
        $this->view->set([
            'title' => 'Книги',
            'books' => $books,
            'categorys' => $categorys
        ]);
        $this->view->render('views');
    }

    public function insertAction()
    {
        $post = $this->request->post;
        $status = false;
        if(!empty($post)){
            $post['category'] = $this->serializeCategory($post['category']);
            if((new Rules($post))->checkInsertBook() == false){
                $model = new Book();
                $model->InsertBook($post['category'], $post['name'], $post['price']);
                $status = true;
            }
        }
        $this->view->set([
            'title' => 'Добавление записи',
            'create' => true,
            'categorys' => $categorys = Category::SelectAllCategory(),
            'status' => $status
        ]);
        $this->view->render('view');
    }

    public function updateAction($id)
    {
        $post = $this->request->post;
        if((new Rules(['id' => $id]))->checkDeleteBook() == false){
            $status = false;
            $book = Book::SelectBook($id);
            $book['category'] = $this->unserializeCategory($book['category']);
            if(!empty($post)){
                if((new Rules($post))->checkUpdateBook() == false){
                    $post['category'] = $this->serializeCategory($post['category']);
                    $model = new Book();
                    $model->UpdateBook($post['id'], $post['category'], $post['name'], $post['price']);
                }
            }
            $this->view->set([
                'title' => 'Обновление записи',
                'update' => true,
                'book' => $book,
                'categorys' => $categorys = Category::SelectAllCategory(),
            ]);
            $this->view->render('view');
        }
    }

    public function deleteAction()
    {
        $post = $this->request->post;
        if(!empty($post)){
            if((new Rules($post))->checkDeleteBook() == false){
                $model = new Book();
                $model->DeleteBook($post['id']);
            }
        }
    }

    private function serializeCategory($category = null)
    {
        return serialize($category);
    }

    private function unserializeCategory($category)
    {
        return unserialize($category);
    }

/*
    public function indexAction() 
    {        
        $this->view->set([
            'title' => 'Blog',
        ]);          
        $this->view->render('index');
    }   
    
    public function viewBlogAction($userName) 
    {        
        echo __FILE__ . ' - ' . __METHOD__ . '<br>';
        var_dump($userName);
    }    
    
    public function viewPostAction($userName, $postId) 
    {        
        echo __FILE__ . ' - ' . __METHOD__ . '<br>';
        var_dump($userName);
        var_dump($postId);
    }        
    */
}
