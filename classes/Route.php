<?php

class Route{

    private $_uri = array();
    private $_method = array();

    /**
     * Builds a collection of urls to look for
     * @param $uri
     */
    public function add($uri, $method = null)
    {
        $this->_uri[] = '/' . trim($uri);

        if(!$method = null){
            $this->_method[] = $method;
        }
    }

    /**
     * Make the routing system work
     */

    public function submit()
    {
       $uriGetParam = isset($_GET['URI']) ? $_GET['URI'] : '/';

       foreach($this->_uri as $key => $value)
       {
            if(preg_match("#^".$value."^# ", $uriGetParam))
            {

            }
       }
    }
}