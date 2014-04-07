<?php
namespace Framework\Cache;

class FileSystemCacheAdapter implements CacheAdapter
{
    /** @type FileSystemCache */
    protected $cache;

    /**
     * @param FileSystemCache $cache
     */
    public function __construct(FileSystemCache $cache)
    {
        $this->cache = $cache;
    }

    public function fetch($id)
    {
        return $this->cache->fetch($id);
    }

    public function contains($id)
    {
        return $this->cache->test($id);
    }

    public function save($id, $value)
    {
        return $this->cache->load($id, $value);
    }

    public function delete($id)
    {
        return $this->cache->remove($id);
    }
}
