<?php
class database
{
    private static $dbhost = "localhost";
    private static $dbname = "fast-food";
    private static $dbuser = "root";
    private static $dbuserpassword= "";

    private static $connection = null;

    public static function connect()
   { 
   try
   {
      self::$connection = new PDO("mysql:host=" . self::$dbhost . 
      ";dbname" . self::$dbname,self::$dbuser,self::$dbuserpassword);
   }
   catch(PDOExeption $e)
   { 
    die($e->getMessage());
   }
   return self::$connection;
 

}
public static function disconnect()
{
    self::$connection = null;
}
}


?>