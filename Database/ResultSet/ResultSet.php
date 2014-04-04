<?php
namespace Database\ResultSet;

interface ResultSet
{
    /**
     * @param array $rows
     */
    public function populate(array $rows);

    /**
     * @return array
     */
    public function getRows();
}
