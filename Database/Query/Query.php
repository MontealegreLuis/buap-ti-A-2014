<?php
namespace Database\Query;

class Query
{
    protected $select = [];
    protected $from = [];
    protected $where = [];

    public function addSelec($field)
    {
        $this->select[] = $field;
    }

    public function addFrom($table)
    {
        $this->from[] = $table;
    }

    /**
     * @param string $condition
     */
    public function addWhere($condition)
    {
        $this->where[] = $condition;
    }

    /**
     * @return string
     */
    public function getSQL()
    {
        $sql = 'SELECT ';
        $sql .= implode(', ', $this->select);
        $sql .= ' FROM ';
        $sql .= implode(', ', $this->from);

        // Only AND is used when more than one condition exist
        if (!empty($this->where)) {
            $sql .= ' WHERE ';
            $sql .= implode(' AND ', $this->where);
        }

        return $sql;
    }
}
