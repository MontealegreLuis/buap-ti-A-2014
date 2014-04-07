<?php
namespace Framework\Database;

use \PDO;

class DriverManager
{
    /**
     * @param  array $options
     * @return \PDO
     */
    public function getConnection(array $options)
    {
        $driver = $options['driver'];
        switch ($driver) {
            case 'sqlite' :
                $factory = new PdoSqliteDriver();
                break;
            default:
                $factory = new PdoMySqlDriver();
        }
        $username = $options['username'];
        $password = $options['password'];
        $connection = $factory->connect($options, $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}
