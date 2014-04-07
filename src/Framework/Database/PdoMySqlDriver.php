<?php
namespace Framework\Database;

use \PDO;

class PdoMySqlDriver implements DatabaseDriver
{
    /**
     * @see \Database\DatabaseDriver::connect()
     */
    public function connect(array $options, $username, $password)
    {
        $dsn = 'mysql:';
        if ($options['host']) {
            $dsn .= "host={$options['host']}";
        }
        if ($options['dbname']) {
            $dsn .= ";dbname={$options['dbname']}";
        }

        $connection = new PDO($dsn, $username, $password);
        $connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET names 'utf8'");

        return $connection;
    }
}
