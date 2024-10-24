<?php

namespace MyWarm\Timestamp;

use DateInterval;
use DateTimeImmutable;
use DateTimeInterface;

class Timestamp
{
    public const ONE_DAY_IN_SECONDS = 86400;

    private DateTimeInterface $time;

    public function __construct(private int $timestamp)
    {
        $this->time = (new DateTimeImmutable())->setTimestamp($timestamp);
    }

    public function getTime(): DateTimeInterface
    {
        return $this->time;
    }

    public function isWithin24Hours(Timestamp $other): bool
    {
        return $this->time->diff($other->getTime(), true) < DateInterval::createFromDateString('1 day');
    }

}
