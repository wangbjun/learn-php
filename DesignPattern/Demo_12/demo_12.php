<?php

namespace DesignPattern\Demo_12;

include "../../include.php";

/**
 * 责任链模式
 */

$loggerChain = getChainOfLoggers();

$loggerChain->logMessage(AbstractLogger::INFO, 'This is an information');
$loggerChain->logMessage(AbstractLogger::DEBUG, 'This is an debug');
$loggerChain->logMessage(AbstractLogger::ERROR, 'This is an error');


function getChainOfLoggers(): AbstractLogger
{
    $errorLogger   = new ErrorLogger(AbstractLogger::ERROR);
    $fileLogger    = new FileLogger(AbstractLogger::DEBUG);
    $consoleLogger = new ConsoleLogger(AbstractLogger::INFO);

    $errorLogger->setNextLogger($fileLogger);

    $fileLogger->setNextLogger($consoleLogger);

    return $errorLogger;
}
