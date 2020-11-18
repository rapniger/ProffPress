<?php


namespace application\System;

use Rakit\Validation\Validator;

/**
 * Class Rules
 * @package application\System
 */
class Rules
{
    /**
     * @var
     */
    private $params;

    /**
     * Rules constructor.
     * @param $params
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * @return bool
     */
    public function checkInsertBook()
    {
        $validator = new Validator;

        $validation = $validator->validate($this->params, [
            'name'=> 'required',
            'price' => 'integer',
            'category' => 'required'
        ]);

        return $validation->fails();
    }
    /**
     * @return bool
     */
    public function checkUpdateBook()
    {
        $validator = new Validator;

        $validation = $validator->validate($this->params, [
            'id' => 'required|numeric',
            'name'=> 'required',
            'price' => 'integer',
            'category' => 'required'
        ]);

        return $validation->fails();
    }

    /**
     * @return bool
     */
    public function checkDeleteBook()
    {
        $validator = new Validator;

        $validation = $validator->validate($this->params, [
            'id' => 'required|numeric'
        ]);

        return $validation->fails();
    }
    /**
     * @return bool
     */
    public function checkInsertCategory()
    {
        $validator = new Validator;

        $validation = $validator->validate($this->params, [
            'name'=> 'required'
        ]);

        return $validation->fails();
    }

    /**
     * @return bool
     */
    public function checkUpdateCategory()
    {
        $validator = new Validator;

        $validation = $validator->validate($this->params, [
            'id' => 'required|numeric',
            'name'=> 'required'
        ]);

        return $validation->fails();
    }
}