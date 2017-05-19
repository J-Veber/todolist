<?php
use duncan3dc\Laravel\BladeInstance;

class App
{
    private $services = [];

    function __construct()
    {
        $host = DB_HOST;
        $dbname = DB_NAME;
        $dbuser = DB_USER;
        $dbpassw = DB_PASS;
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try
        {
            $db = new PDO($dsn, $dbuser, $dbpassw, $opt);
        } catch (PDOException $e)
        {
            //print "Error!: " . $e->getMessage() . "<br/>";
            die('Подключение не удалось: ' . $e->getMessage());
        }
        //echo __DIR__;
        $blade = new BladeInstance(ROOT_PATH . "src/Controllers/views", ROOT_PATH . "src/Controllers/views/cache");

        $this->services = [
            'PDO' => $db,
            'blade' => $blade
        ];
    }

    public function getService($alias)
    {
        return $this->services[$alias];
    }
}