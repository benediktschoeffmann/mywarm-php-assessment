<?php

namespace MyWarm\Assessment\Model;

use DateTime;

class LogEntryFactory
{
    public const DELTA_T_MAX = 12;

    private DateTime $initialDate;

    private int $currentTimeStamp;

    private array $pageIds = [];

    private array $userIds = [];

    public function __construct(string $initialDateString)
    {
        $this->initialDate = new DateTime($initialDateString);
        $this->currentTimeStamp = $this->initialDate->getTimestamp();
    }

    private function getFileHandle()
    {
        return fopen(dirname(__FILE__).'/../../data/'.$this->initialDate->format('Y-m-d').'.csv', 'w');
    }

    public function create()
    {
        $this->createPageIds(10000);
        $this->createUserIds(1000);
        $handle = $this->getFileHandle();
        fputcsv($handle, ['date', 'pageId', 'userId']);
        while (($t = $this->nextTimestamp()) != null) {
            fputcsv($handle, [
                $t,
                $this->nextPageId(),
                $this->nextUserId()
            ]);
        }

        fclose($handle);
    }

    private function nextTimestamp(): int|null
    {
        $random = rand(0, self::DELTA_T_MAX);
        $day = $this->initialDate->getTimestamp() + 3600;
        if ($this->currentTimeStamp + $random < $day) {
            $this->currentTimeStamp += $random;
            return $this->currentTimeStamp;
        }

        return null;
    }

    private function createPageIds(int $amount): void
    {
        for ($i = 0; $i < $amount; $i++) {
            $this->pageIds[] = rand(0, 9999);
        }
    }

    private function createUserIds(int $amount): void
    {
        for ($i = 0; $i < $amount; $i++) {
            $this->userIds[] = rand(0, 999);
        }
    }

    private function nextPageId(): int
    {
        return $this->pageIds[rand(0, count($this->pageIds) - 1)];
    }

    private function nextUserId(): int
    {
        // return rand(0, 10000);
        return $this->userIds[rand(0, count($this->userIds) - 1)];

    }

}
