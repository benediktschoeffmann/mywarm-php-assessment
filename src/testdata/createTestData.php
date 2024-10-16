<?php

namespace MyWarm\PhpTest\TestData;

require_once __DIR__ ."/../../vendor/autoload.php";

$dates = [
    '2024-01-01',
    '2024-01-02',
    '2024-01-03',
    '2024-01-04'
];

foreach ($dates as $date) {
    $logEntryFactory = new LogEntryFactory($date);
    $logEntryFactory->create();
}