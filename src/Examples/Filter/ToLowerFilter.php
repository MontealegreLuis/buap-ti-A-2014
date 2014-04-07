<?php
namespace Examples\Filter;

class ToLowerFilter
{
    public function filter($text)
    {
        return strtolower($text);
    }
}
