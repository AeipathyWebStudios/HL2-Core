<?php

class Item{

    private $_db,
            $_data;

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
    public function delete($where)
    {
        return $this->_db->delete('items', $where);
    }

    public function getField($field)
    {
        return $field = Input::get($field);
    }

    public function find($item = null)
    {
        if($item){
            $field = (is_numeric($item)) ? 'id' : 'name';
            $data = $this->_db->get('users', array($field, '=', $item));

            if($data->count()){
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function getAll($table)
    {
        $items = $this->_db->get('items', null);

        foreach($items as $item){

        }

    }

}