<?php

declare(strict_types=1);

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getCountQuestion;

function getRule(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
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

function getAnswer(int $question): string
{
    return (($question % 2) == 0) ? 'yes' : 'no';
}
