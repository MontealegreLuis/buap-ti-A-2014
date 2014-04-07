<?php
namespace Framework\Cache;

class FileSystemCache
{
    /** @type string */
    protected $path;

    /**
     * @param string $path The path to the folder where the cache files will be stored
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function load($item, $value)
    {
        $filename = $this->buildFilename($item);
        $handle = fopen($filename, 'w');
        fwrite($handle, serialize($value));
        fclose($handle);
    }

    public function fetch($item)
    {
        $filename = $this->buildFilename($item);
        $handle = fopen($filename, 'r');
        $value = fread($handle, filesize($filename));
        fclose($handle);

        return unserialize($value);
    }

    public function remove($item)
    {
        $filename = $this->buildFilename($item);
        unlink($filename);
    }

    public function test($item)
    {
        $filename = $this->buildFilename($item);

        return file_exists($filename);
    }

    /**
     * @param  string $name
     * @return string
     */
    protected function buildFilename($name)
    {
        return "{$this->path}/$name.cache";
    }
}
