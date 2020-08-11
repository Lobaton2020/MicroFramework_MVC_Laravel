<?php

class DB
{
    private function __contruct()
    {
    }
    public static function get($sql, $params = [])
    {
        $stmt = self::connection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    }
    public static function query($sql, $params = [])
    {
        $stmt = self::connection()->prepare($sql);
        return $stmt->execute($params);
    }

    public static function select($sql)
    {
        $stmt = self::connection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    private static function connection()
    {
        $dbh = new PDO("mysql:host=localhost;dbname=transpublic", "root", "12345");
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $dbh;
    }
}
