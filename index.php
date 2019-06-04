<?php

require_once './vendor/autoload.php';

use src\Calculator;
use src\Commands\SubCommand;
use src\Commands\SumCommand;

$calc = new Calculator();
$calc->addCommand('+', new SumCommand())
    ->addCommand('-', new SubCommand());

echo $calc->init(1)
    ->compute('+', 1)
    ->getResult();

echo '<hr>';

echo $calc->init(15)
    ->compute('+', 5)
    ->compute('-', 10)
    ->getResult();
