<?php

require __DIR__ . '/vendor/autoload.php';

$year = Parser::parse('http://www.consultant.ru/law/ref/calendar/proizvodstvennye/2020');

var_dump($year);
