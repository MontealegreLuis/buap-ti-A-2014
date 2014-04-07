<?php
namespace Framework\Database;

interface DatabaseDriver
{
    /**
     * @param  array  $options
     * @param  string $username
     * @param  string $password
     * @return \PDO
     */
    public function connect(array $options, $username, $password);
}
