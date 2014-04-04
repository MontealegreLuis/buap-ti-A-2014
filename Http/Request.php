<?php
namespace Http;

class Request
{
    /** @type array */
    protected $post;

    /** @type array */
    protected $query;

    /** @type array */
    protected $server;

    /**
     * @param array $post
     * @param array $query
     * @param array $server
     */
    public function __construct(array $post = [], array $query = [], array $server = [])
    {
        $this->post = $post;
        $this->query = $query;
        $this->server = $server;
    }

    /**
     * @return array | string
     */
    public function post($key = null)
    {
        if ($key) {
            return $this->post[$key];
        }

        return $this->post;
    }

    /**
     * @return array | string
     */
    public function query($key = null)
    {
        if ($key) {
            return $this->query[$key];
        }

        return $this->query;
    }

    /**
     * @return array | string
     */
    public function server($key = null)
    {
        if ($key) {
            return $this->server[$key];
        }

        return $this->server;
    }

    /**
     * @return boolean
     */
    public function isPost()
    {
        return 'POST' === $this->server['REQUEST_METHOD'];
    }
}
