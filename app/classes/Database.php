<?php
namespace App\classes;
class Database
{
    public function dbConnection() {
        $hostName = 'localhost';
        $userName = 'root';
        $password = '';
        $dbName = 'blog73';
        $link = mysqli_connect($hostName, $userName, $password, $dbName);
        return $link;
    }
}