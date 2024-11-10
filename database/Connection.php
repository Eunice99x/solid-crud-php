<?php
 class Connection {
    private static ?PDO $instance = null;

    public static function getInstance():PDO {
        if (self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost;dbname=php_solid','root','root');
        }
        return self::$instance;
    }
 }