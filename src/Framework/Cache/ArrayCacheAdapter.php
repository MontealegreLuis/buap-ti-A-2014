<?php
namespace Framework\Cache;

class ArrayCacheAdapter implements CacheAdapter
{
    /** @type ArrayCache */
    protected $cache;

    /**
     * @param ArrayCache $cache
     */
    public function __construct(ArrayCache $cache)
    {
        $this->cache = $cache;
    }

    public function fetch($id)
    {
        return $this->cache->getItem($id);
    }

    public function contains($id)
    {
        return $this->cache->hasItem($id);
    }

    public function save($id, $value)
    {
        return $this->cache->addItem($id, $value);
    }

    public function delete($id)
    {
        return $this->cache->removeItem($id);
    }
}
