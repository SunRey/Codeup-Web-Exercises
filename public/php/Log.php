<?php

class Log
{
    public $filename = '';

    public function logMessage($logLevel, $message)
    {
        $date_log = date("Y-m-d");
        $this->filename = "log-{$date_log}.log";
        $handle = fopen($this->filename, 'a');
        fwrite($handle, $date_log . ' ' . date('H:i:s') . " {$logLevel}: {$message}\n");
        fclose($handle);
    }

    public function logInfo ($message)
    {
        $this->logMessage('INFO', $message);
    }

    public function logError($message)
    {
        $this->logMessage('ERROR', $message);
    }

}
