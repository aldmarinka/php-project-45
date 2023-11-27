<?php

declare(strict_types=1);

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\COUNT_QUESTIONS;

function getRule(): string
{
    return 'What number is missing in the progression?';
}

function play(): void
{
    $gameRounds      = [];

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $length = rand(5, 10);
        $firstElement = rand(1, 10);
        $step = rand(1, 5);
        $hiddenNumber = rand(0, $length - 1);

        $progression   = [];
        for ($j = 0; $j < $length; $j++) {
            $progression[] = $firstElement + $j * $step;
        }

        $hiddenElement = $progression[$hiddenNumber];
        $progression[$hiddenNumber] = '..';

        $strProgression = implode(' ', $progression);

        $gameRounds[$strProgression] = $hiddenElement;
    }

    startGame(getRule(), $gameRounds);
}
