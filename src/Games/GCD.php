<?php

declare(strict_types=1);

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getCountQuestion;

function getRule(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function play(): void
{
    $arGame      = [];
    $numQuestion = 0;

    while ($numQuestion < getCountQuestion()) {
        $first = rand(0, 100);
        $second = rand(0, 100);

        $question = "{$first} {$second}";

        $arGame[$question] = getAnswer($first, $second);
        $numQuestion++;
    }

    startGame(getRule(), $arGame);
}

function getAnswer(int $first, int $second): int
{
    while ($second != 0) {
        $remainder = $first % $second;
        $first = $second;
        $second = $remainder;
    }

    return abs($first);
}
