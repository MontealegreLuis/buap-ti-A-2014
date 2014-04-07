<?php
namespace Framework\Cache;

use \PHPUnit_Framework_TestCase;

class ArrayCacheAdapterTest extends PHPUnit_Framework_TestCase
{
    public function testCanSaveItemInCache()
    {
        $cacheKey = 'test';
        $valueCached = new \stdClass();

        $arrayCache = $this->getMockBuilder('Framework\Cache\ArrayCache')->getMock();

        $arrayCache->expects($this->once())
                   ->method('addItem')
                   ->with($cacheKey, $valueCached);

        $arrayCache->expects($this->once())
                   ->method('getItem')
                   ->with($cacheKey)
                   ->will($this->returnValue($valueCached));

        $cache = new ArrayCacheAdapter($arrayCache);

    	$cache->save($cacheKey, $valueCached);

    	$this->assertEquals($valueCached, $cache->fetch($cacheKey));
    }
}