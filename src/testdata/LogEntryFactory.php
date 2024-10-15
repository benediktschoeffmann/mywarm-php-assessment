<?php

namespace MyWarm\PhpTest;

use DateTime;

class LogEntryFactory {
    const DELTA_T_MAX = 12;

    private DateTime $initialDate;

    private int $currentTimeStamp;

    private array $pageIds;

    private array $userIds;
    
    public function __construct(string $initialDateString) {
        $this->initialDate = new DateTime($initialDateString);
    }

    private function getFileHandle() {
        return fopen('../data/'.$this->initialDate, 'w');
    }

    public function create() {
        $this->createPageIds(10000);
        $this->createUserIds(1000);
        $handle = $this->getFileHandle();
        while (($t = $this->nextTimestamp()) != null) {
            fwrite($handle, "$t,{$this->nextPageId()},{$this->nextUserId()}");
        }

        fclose($handle);
    }

    private function nextTimestamp() {
        $random = rand(0, self::DELTA_T_MAX);
        $day = $this->initialDate->getTimestamp() + 3600;
        while ($this->currentTimeStamp + $random < $day) {
            $this->currentTimeStamp += $random;
            yield $this->currentTimeStamp;
        }

        yield null;
    }

    private function createPageIds(int $amount): void {
        while ($amount-- > 0) {
            $this->pageIds[] = rand(0, 10000);
        }
    }

    private function createUserIds(int $amount): void {
        while ($amount-- > 0) {
            $this->pageIds[] = rand(1000, 5000);
        }
    }

    private function nextPageId() {
        $numberOfPageIds = count($this->pageIds);
        while (true) {
            yield $this->pageIds[rand(0, $numberOfPageIds)];
        }
    }

    private function nextUserId() {
        $numberOfUserIds = count($this->userIds);
        while (true) {
            yield $this->userIds[rand(0, $numberOfUserIds)];
        }
    }

}