<?php


require 'Medoo.php';

use Medoo\Medoo;

$database = new Medoo([

    'database_type' => 'mysql',
    'database_name' => 'e_assis',
    'server' => 'localhost',
    'port' => 3306,
    'username' => 'root',
    'password' => ''
    
]);
