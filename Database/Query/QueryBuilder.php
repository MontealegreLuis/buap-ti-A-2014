<?php
namespace Database\Query;

class QueryBuilder
{
    /** @type Query */
    protected $query;

    public function createQuery()
    {
        $this->query = new Query();

        return $this;
    }

    public function select(array $parts)
    {
        foreach ($parts as $field) {
            $this->query->addSelec($field);
        }

        return $this;
    }

    public function from(array $tables)
    {
        foreach ($tables as $table) {
            $this->query->addFrom($table);
        }

        return $this;
    }

    public function where(array $conditions)
    {
        foreach ($conditions as $condition) {
            $this->query->addWhere($condition);
        }

        return $this;
    }

    /**
     * @return Query
     */
    public function getQuery()
    {
        return $this->query;
    }
}
