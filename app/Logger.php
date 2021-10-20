<?php

namespace App;

use Psr\Log\AbstractLogger;
use Exception;

class Logger extends AbstractLogger
{
    protected object $writer;
    protected object $format;
    protected string $data;

    public function __construct(WriterInterface $writer, FormatInterface $format)
    {
        $this->writer = $writer;
        $this->format = $format;
    }

    public function format($level, $message, array $context = []): string
    {
        return $this->format->format($level, $message, $context);
    }

    public function write($data)
    {
        return $this->writer->write($data);
    }

    public function log($level = 'Test Level', $message = 'Test message', array $context = array())
    {
        $formatted = $this->format($level, $message, $context);
        $this->write($formatted);
    }

    public function doSomethingElse()
    {
        throw new Exception('Some error');
    }

    public function doSomething()
    {
        $this->log('info', 'Doing work', ['config' => 'ok', 'server' => 'ok']);

        try {
            $this->doSomethingElse();
        } catch (Exception $exception) {
            $this->error('Oh no!', array('exception' => $exception->getMessage()));
        }
    }
}