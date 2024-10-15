<?php

namespace MyWarm\PhpTest\TestData;

require_once __DIR__ ."/../../vendor/autoload.php";

$dates = [
    '2025-01-01',
    '2025-01-02',
    '2025-01-03',
    '2025-01-04'
];

foreach ($dates as $date) {
    $logEntryFactory = new LogEntryFactory($date);
    $logEntryFactory->create();
}