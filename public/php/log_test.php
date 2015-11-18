<?php
date_default_timezone_set('America/Chicago');
require_once 'Log.php';

$log = new Log();

$log->logInfo('info message');
$log->logError('error message');
$log->logMessage('WARNING', 'this is working!');

