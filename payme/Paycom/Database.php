<?php

namespace Paycom;

class Database
{
    public $config;

    protected static $db;

    public function __construct(array $config = null)
    {
        $this->config = $config;
    }

    public function new_connection()
    {
        $db = null;

        // connect to the database
        $db_options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, // fetch rows as associative array
            \PDO::ATTR_PERSISTENT         => true // use existing connection if exists
        ];

        $db = new \PDO(
            'mysql:dbname=' . $this->config['db']['database'] . ';host=' . $this->config['db']['host'] . ';charset=utf8',
            $this->config['db']['username'],
            $this->config['db']['password'],
            $db_options
        );

        return $db;
    }

    /**
     * Connects to the database
     * @return null|\PDO connection
     */
    public static function db()
    {
        if (!self::$db) {
//            $config   = require_once CONFIG_FILE;
            $config   = [
                // Get it in merchant's cabinet in cashbox settings
                'merchant_id' => '597b33e0db0c690e08708d37',

                // Login is always "Paycom"
                'login'       => 'Paycom',

                // File with cashbox key (key can be found in cashbox settings)
                'keyFile'     => '2rFMBFoCTdY&aOUo9j%rKjKnIAqijDSDvAd8',

                // Your database settings
                'db'          => [
                    'host'     => 'localhost',
                    'database' => 'kapdepo',
                    'username' => 'kapdepo',
                    'password' => 'pdJg2i!LVWm6',
                ]];
            $instance = new self($config);
            self::$db = $instance->new_connection();
        }

        return self::$db;
    }
}