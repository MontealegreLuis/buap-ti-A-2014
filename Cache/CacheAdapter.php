<?php
namespace Cache;

interface CacheAdapter
{
    public function fetch($id);
    public function contains($id);
    public function save($id, $value);
    public function delete($id);
}
