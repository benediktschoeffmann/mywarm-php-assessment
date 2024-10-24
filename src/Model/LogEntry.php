<?php

namespace MyWarm\Assessment\Model;

class LogEntry
{
    public function __construct(private readonly int $timestamp, private readonly int $pageId, private readonly int $userId)
    {
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function getPageId(): int
    {
        return $this->pageId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public static function fromArray(array $data): LogEntry
    {
        return new LogEntry(
            $data['timestamp'],
            $data['pageId'],
            $data['userId']
        );
    }

}
