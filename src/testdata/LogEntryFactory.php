<?php

namespace MyWarm\PhpTest\TestData;

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
        return fopen(dirname(__FILE__).'/../../data/'.$this->initialDate->format('Y-m-d').'.csv', 'w');
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

    private function nextTimestamp(): int|null {
        $random = rand(0, self::DELTA_T_MAX);
        $day = $this->initialDate->getTimestamp() + 3600;
        if ($this->currentTimeStamp + $random < $day) {
            $this->currentTimeStamp += $random;
            return $this->currentTimeStamp;
        }

        return null;
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

    private function nextPageId(): int {
        return $this->pageIds[rand(0, count($this->pageIds))];
    }

    private function nextUserId(): int {        
        return $this->userIds[rand(0, count($this->userIds))];

    }

}