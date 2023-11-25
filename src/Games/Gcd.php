<?php

declare(strict_types=1);

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\COUNT_QUESTIONS;

function getRule(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function play(): void
{
    $arGame      = [];

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $first = rand(0, 100);
        $second = rand(0, 100);

        $question = "{$first} {$second}";

        $arGame[$question] = getGcd($first, $second);
    }

    startGame(getRule(), $arGame);
}

function getGcd(int $first, int $second): int
{
    while ($second != 0) {
        $remainder = $first % $second;
        $first = $second;
        $second = $remainder;
    }

    return abs($first);
}
