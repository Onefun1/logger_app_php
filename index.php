<?php

include 'vendor/autoload.php';


$logger = new \App\Logger();

function foo(\Psr\Log\LoggerInterface $someClass)
{

}


foo($logger);