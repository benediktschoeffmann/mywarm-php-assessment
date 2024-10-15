<?php

namespace MyWarm\PhpTest;

use DateTime;

class LogEntry {

    private int $timestamp;
    private int $pageId;
    private int $userId;

    public function __construct(int $timestamp, int $pageId, int $userId) {
        $this->timestamp = $timestamp;
        $this->pageId = $pageId;
        $this->userId = $userId;
    }

    private function getFileName() {
        $dt = (new DateTime())->setTimestamp($this->timestamp);
        return $dt->format('Y-m-d') . '.log';
    }



}