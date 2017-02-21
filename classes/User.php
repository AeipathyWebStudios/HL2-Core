<?php

class User{

    private $_db;

    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();
    }

    public function create($fields = array())
    {
        if(!$this->_db->insert('users', $fields)){
            throw new Exception('There was an issue creating your account, please contact a developer.');
        }
    }
}