<?php
class OnlyFilesFilterIterator extends FilterIterator
{
    public function accept()
    {
        $file = $this->current();

        return !$file->isDir() && !$file->isDot();
    }
}

$directory = new DirectoryIterator('./');
$onlyFiles = new OnlyFilesFilterIterator($directory);
$limit = new LimitIterator($onlyFiles, 0, 3);

foreach ($limit as $file) {
    echo "{$file->getBasename()}\n";
}
