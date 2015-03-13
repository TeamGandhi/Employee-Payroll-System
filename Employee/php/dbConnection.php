<?php
define ("servername","localhost");
define ("username", "root");
define ("password", "");
define ("database", "test");

class Db
{
    static $pdo;

    static function query($_request, $_params = array())
    {
        self::ensureConnected();
        $query = self::prepare($_request, $_params);
        if (!$query->execute())
        {
            return false;
        }
        return $query->fetchAll();
    }

    static function execute($_request, $_params = array())
    {
        self::ensureConnected();
        $query = self::prepare($_request, $_params);
        if (!$query->execute())
        {
            return false;
        }
        return $query->rowCount();
    }

    static function connect()
    {
        try
        {
            self::$pdo = new PDO("mysql:host=".servername.";dbname=". database, username, password);
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    private static function ensureConnected()
    {
        if (!isset(self::$db))
        {
            self::connect();
        }
    }

    private static function prepare($_request, $_params = array())
    {
        self::ensureConnected();
        $count = count($_params);
        $query = self::$pdo->prepare($_request);
        if (is_array($_params))
        {
            for ($i = 0; $i < $count; $i++)
            {
                $query->bindParam($i + 1, $_params[$i]);
            }
        }
        else
        {
            $query->bindParam(1, $_params);
        }
        return $query;
    }
}

?>
