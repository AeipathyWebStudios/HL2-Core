<?php

require_once 'core/init.php';

$userInsert = DB::getInstance()->update('users', 1, array(
    'username' => 'Shitcunt'
));

