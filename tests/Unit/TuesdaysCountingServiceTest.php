<?php

namespace Tests\Unit;

use App\Services\TuesdaysCountingService;
use PHPUnit\Framework\TestCase;

final class TuesdaysCountingServiceTest extends TestCase
{
    public function testCountTuesdaysFn()
    {
        $assertations = [
            [['2023-02-28', '2023-01-31'], 5],
            [['2023-02-28', '2023-01-30'], 5],
            [['2023-02-28', '2023-01-25'], 5],
            [['2023-02-28', '2023-01-24'], 6],
            [['2023-01-30', '2023-01-28'], 0],
            [['2023-01-31', '2023-01-28'], 1],
            [['2023-02-01', '2023-01-28'], 1],
            [['2023-02-02', '2023-01-28'], 1],
            [['2023-01-28', '2023-02-06'], 1],
            [['2023-01-28', '2023-02-07'], 2],
            [['2023-01-28', '2023-02-08'], 2],
            [['2023-01-31', '2023-02-08'], 2],
            [['2023-02-01', '2023-02-08'], 1],
            [['2023-02-07', '2023-02-07'], 1],
            [['2023-02-06', '2023-02-07'], 1],
            [['2023-02-07', '2023-02-08'], 1],
        ];

        foreach ($assertations as $key => $assertation) {
            $boundaryDates = $assertation[0];
            $returnValue = $assertation[1];
            $this->assertEquals(TuesdaysCountingService::countTuesdays($boundaryDates), $returnValue);
        }
    }
}
