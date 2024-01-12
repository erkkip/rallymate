<?php

namespace App;

use Carbon\CarbonInterval;
use Illuminate\Support\Str;

final class TimeMutator
{
    public static function toMilliseconds(string $humanReadable): int
    {
        return CarbonInterval::createFromFormat('i:s.v', $humanReadable)->totalMilliseconds;
    }

    public static function toHumanReadable(int $milliseconds, bool $withPrefix = false): string
    {
        $isNegative = $milliseconds < 0;
        $milliseconds = abs($milliseconds);

        $i = (int) floor($milliseconds / 1000 / 60);
        $s = $milliseconds / 1000 % 60;
        $v = $milliseconds % 1000;

        return sprintf(
            '%s%s:%s.%s',
            $withPrefix ? $isNegative ? '-' : '+' : '',
            Str::padLeft($i, 2, 0),
            Str::padLeft($s, 2, 0),
            Str::padLeft($v, 3, 0)
        );
    }
}
