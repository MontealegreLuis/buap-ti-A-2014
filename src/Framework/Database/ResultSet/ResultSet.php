<?php
namespace Framework\Database\ResultSet;

interface ResultSet
{
    /**
     * @param array $rows
     */
    public function populate(array $row);

    /**
     * @return mixed
     */
    public function getRow();

    /**
     * @param array $rows
     */
    public function populateAll(array $rows);

    /**
     * @return array
     */
    public function getRows();
}
