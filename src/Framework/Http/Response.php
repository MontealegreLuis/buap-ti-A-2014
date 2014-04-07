<?php
namespace Framework\Http;

class Response
{
    /** @type string */
    protected $body;

    /** @type int */
    protected $statusCode;

    /** @type string */
    protected $contentType;

    /** @type string */
    protected $redirectUrl;

    /**
     * Set default values
     */
    public function __construct()
    {
        $this->setStatusCode(200);
        $this->setContentType('text/html');
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @param string $url
     */
    public function setRedirectUrl($url)
    {
        $this->redirectUrl = $url;
    }

    /**
     * @return boolean
     */
    public function isRedirect()
    {
        return !empty($this->redirectUrl);
    }

    /**
     * @return void
     */
    public function send()
    {
        if ($this->isRedirect()) {
            header("Location: {$this->redirectUrl}");

            return;
        }

        http_response_code($this->statusCode);
        header("Content-type: {$this->contentType}");

        echo $this->body;
    }
}
