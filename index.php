<?php

include 'vendor/autoload.php';


use \App\Logger;
use \App\StringFormat;
use \App\FileWriter;
use \App\DbWriter;
use Psr\Log\AbstractLogger;


$fileWriter = new FileWriter;
$format = new StringFormat;

$dbWriter = new DbWriter();


$logger = new Logger($fileWriter, $format);
$logger2 = new Logger($dbWriter, $format);


function testLogger(AbstractLogger $logger)
{
    $logger->doSomething();
}

testLogger($logger);
testLogger($logger2);


