<?php

declare(strict_types=1);

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getCountQuestion;

function getRule(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function play(): void
{
    $arGame      = [];
    $numQuestion = 0;

    while ($numQuestion < getCountQuestion()) {
        $number = rand(1, 100);

        $arGame[$number] = getAnswer($number);
        $numQuestion++;
    }

    startGame(getRule(), $arGame);
}

function getAnswer(int $number): string
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            return 'no';
        }
    }

    return 'yes';
}
