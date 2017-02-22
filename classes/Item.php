<?php

class Item{

    private $_db;

    public function __construct($item = null)
    {
        $this->_db = DB::getInstance();
    }

    public function create($fields = array())
    {
        if(!$this->_db->insert('items', $fields)){
            throw new Exception('There was an issue creating the item, please contact a developer.');
        }
    }

}