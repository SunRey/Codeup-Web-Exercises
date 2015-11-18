<?php
date_default_timezone_set('America/Chicago');

function logMessage($logLevel, $message)
{
    $date_log = date("Y-m-d");
    $filename = "log-{$date_log}.log";
    $handle = fopen($filename, 'a');
    fwrite($handle, $date_log . ' ' . date('H:i:s') . " {$logLevel}: {$message}\n");
    fclose($handle);
}

function logInfo ($message) 
{
    logMessage('INFO', $message);
}

function logError ($message)
{
    logMessage('ERROR', $message);
}

logInfo("This is an info-mercial.");
logError("This is an error, you gunna DIE.");
