<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

echo(\App\Services\TuesdaysCountingService::countTuesdays(["2023-02-28", "2023-01-25"]));
