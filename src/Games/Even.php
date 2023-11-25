<?php

declare(strict_types=1);

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\COUNT_QUESTIONS;

function getRule(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function play(): void
{
    $arGame      = [];

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $number = rand(1, 100);

        $arGame[$number] = inEven($number);
    }

    startGame(getRule(), $arGame);
}

function inEven(int $question): string
{
    return (($question % 2) == 0) ? 'yes' : 'no';
}
