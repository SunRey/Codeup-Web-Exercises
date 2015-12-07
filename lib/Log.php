<?php

class Log
{
    protected $filename;
    protected $handle;

    public function __construct($prefix = 'log')
    {
        $this->setFileName($prefix);
        $$this->setHandle();
    }

    protected function setFileName($prefix)
    {
        $this->filename = "../data/{$prefix}-" . date("Y-m-d") . ".log";
        settype($this->filename, 'string');
        
    }

    protected function setHandle()
    {
        $this->handle = fopen($this->filename, 'a+');
    }

    public function logMessage($logLevel, $message)
    {
        fwrite($this->handle, date('Y-m-d H:i:s') . " {$logLevel}: {$message}\n");
    }

    public function logInfo ($message)
    {
        $this->logMessage('INFO', $message);
    }

    public function logError($message)
    {
        $this->logMessage('ERROR', $message);
    }

    public function __destruct()
    {
        fclose($this->handle);
    }

}
