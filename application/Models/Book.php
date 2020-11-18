<?php

namespace application\Models;

use LifePHP\Core\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Book
 * @package application\Models
 */
class Book extends Model
{
    /**
     * @var string
     */
    protected $table = 'book';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @param $id
     * @return bool
     */
    public static function SelectBook($id)
    {
        if(empty($id)){
            return false;
        }
        return static::where('id', $id)->first();
    }

    /**
     * @return Book[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function SelectAllBook()
    {
        return static::all();
    }

    /**
     * @param $category
     * @param $name
     * @param $price
     * @return mixed
     */
    public static function InsertBook($category, $name, $price)
    {
        return static::insert(['category' => $category, 'name' => $name, 'price' => $price]);
    }

    /**
     * @param $id
     * @param null $category
     * @param null $name
     * @param null $price
     * @return bool
     */
    public static function UpdateBook($id, $category = null, $name = null, $price = null)
    {
        if(empty($id)){
            return false;
        }
        return static::where('id', $id)->update(['category' => $category, 'name' => $name, 'price' => $price]);
    }

    /**
     * @param $id
     * @return bool
     */
    public static function DeleteBook($id)
    {
        if(empty($id)){
            return false;
        }
        return static::where('id', $id)->delete();
    }
}