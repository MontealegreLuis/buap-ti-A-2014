<?php
namespace Framework\Database;

use \PDO;

class PdoSqliteDriver implements DatabaseDriver
{
    /**
     * @see \Database\DatabaseDriver::connect()
     */
    public function connect(array $options, $username, $password)
    {
        $dsn = 'sqlite:';
        if ($options['path']) {
            $dsn .= "path={$options['path']}";
        } else {
            $dsn .= ":memory:";
        }

        return new PDO($dsn, $$username, $password);
    }
}
