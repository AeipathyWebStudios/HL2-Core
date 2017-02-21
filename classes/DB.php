<?php

class DB{
    private static $_instance = null;

    private $_pdo,
        $_query,
        $_error = false,
        $_results,
        $_count = 0;

    /**
     * DB constructor.
     */

    private function __construct()
    {
        try{
            $this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/database').';', Config::get('mysql/username'), Config::get('mysql/password'));
        } catch(PDOException $exception){
            echo $exception;
        }
    }

    /**
     * @return DB Instance
     */

    public static function getInstance()
    {
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }

        return self::$_instance;
    }

    /**
     * @param $sql
     * @param array $params
     */

    public function query($sql, $params = array())
    {
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)){

            // Check to see whether or not the query has parameters that need binding
            $i = 1;

            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($i, $param);
                    $i++;
                }
            }

            // Check to see if the query can be successfulyl executed
            if($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }else{
                $this->_error = true;
            }
        }

        return $this;
    }

    public function action($action, $table, $where = array())
    {
        // todo
    }

    public function get($table, $where)
    {
        // todo
    }

    public function delete($table, $where)
    {
        // todo
    }

    public function error(){
        return $this->_error;
    }
}