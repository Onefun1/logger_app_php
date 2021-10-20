<?php

namespace App;

class FileWriter implements WriterInterface
{
    protected string $logfile = 'log/log.txt';

    public function write($data)
    {
        file_put_contents($this->logfile, $data, FILE_APPEND);
    }
}