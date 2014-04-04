<?php
namespace Logger;

use \DateTime;

class FilesystemLogger implements Logger
{
    /** @type string */
    protected $filename;

    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @param string $message
     */
    public function log($message)
    {
        $now = new DateTime();
        $message = "\n{$now->format('Y-m-d')} - {$message}";

        file_put_contents($this->filename, $message, FILE_APPEND | LOCK_EX);
    }
}
