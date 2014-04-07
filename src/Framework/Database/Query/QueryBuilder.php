<?php
namespace Framework\Database\Query;

class QueryBuilder
{
    /** @type Query */
    protected $query;

    /**
     * @return QueryBuilder
     */
    public function createQuery()
    {
        $this->query = new Query();

        return $this;
    }

    /**
     * @param  array        $parts
     * @return QueryBuilder
     */
    public function select(array $parts)
    {
        foreach ($parts as $field) {
            $this->query->addSelec($field);
        }

        return $this;
    }

    /**
     * @param  array        $tables
     * @return QueryBuilder
     */
    public function from(array $tables)
    {
        foreach ($tables as $table) {
            $this->query->addFrom($table);
        }

        return $this;
    }

    /**
     * @param  array        $conditions
     * @return QueryBuilder
     */
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
