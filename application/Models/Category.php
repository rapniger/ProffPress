<?php


namespace application\Models;

use LifePHP\Core\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Category
 * @package application\Models
 */
class Category extends Model
{
    /**
     * @var string
     */
    protected $table = 'book_category';
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
     * @return Book[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function SelectAllCategory()
    {
        return static::all();
    }

    /**
     * @param $category
     * @param $name
     * @param $price
     * @return mixed
     */
    public static function InsertCategory($name)
    {
        return static::insert(['name' => $name]);
    }

    /**
     * @param $id
     * @param null $category
     * @param null $name
     * @param null $price
     * @return bool
     */
    public static function UpdateCategory($id, $name = null)
    {
        if(empty($id)){
            return false;
        }
        return static::where('id', $id)->update(['name' => $name]);
    }
}