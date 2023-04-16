<?php

namespace Database;

class MysqlDB
{
    private static $serverName = 'localhost';
    private static $userName = 'root';
    private static $password = '';
    private static $dbName = 'HCD';

    protected static function connect()
    {
        $conn = mysqli_connect(self::$serverName, self::$userName, self::$password, self::$dbName);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else
            return $conn;
    }
}
