<?php

namespace MyWarm\PhpTest\TestData;

class LogEntry
{
    private int $timestamp;
    private int $pageId;
    private int $userId;

    public function __construct(int $timestamp, int $pageId, int $userId)
    {
        $this->timestamp = $timestamp;
        $this->pageId = $pageId;
        $this->userId = $userId;
    }

}
