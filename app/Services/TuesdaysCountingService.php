<?php
declare(strict_types=1);

namespace App\Services;

final class TuesdaysCountingService
{
    /**
     * @throws \Exception
     */
    public static function countTuesdays(array $boundaryDates): int
    {
        sort($boundaryDates);

        $origin = new \DateTimeImmutable($boundaryDates[0]);
        $target = new \DateTimeImmutable($boundaryDates[1]);

        $daysInterval = $origin->diff($target)->days;
        $dayOfWeek = (int)($origin->format('N'));

        $tuesdaysCounter = 0;

        if ($dayOfWeek == 2) {
            $tuesdaysCounter++;
        } else {
            $daysInterval -= self::countDaysToTuesday($dayOfWeek);
            if ($daysInterval >= 0) $tuesdaysCounter++;
        }

        return $tuesdaysCounter + intdiv($daysInterval, 7);
    }

    private static function countDaysToTuesday(int $dayOfWeek): int
    {
        $daysToTuesdayMap = [
            3 => 6,
            4 => 5,
            5 => 4,
            6 => 3,
            7 => 2,
            1 => 1
        ];
        return $daysToTuesdayMap[$dayOfWeek];

    }
}
