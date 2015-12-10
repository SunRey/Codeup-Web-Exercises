<?php
date_default_timezone_set('America/Chicago');
require_once '../../lib/Log.php';

$log = new Log('cli');

$log->logInfo('info message');
$log->logError('error message');
$log->logMessage('WARNING', 'this is working!');
