<?php

declare(strict_types=1);

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getCountQuestion;

function getRule(): string
{
    return 'What is the result of the expression?';
}

function play(): void
{
    $arGame = [];
    $numQuestion = 0;

    while ($numQuestion < getCountQuestion()) {
        $first  = rand(0, 100);
        $second = rand(0, 100);

        switch (rand(0, 2)) {
            case 0:
                $symbol = '+';
                $answer = $first + $second;
                break;
            case 1:
                $symbol = '*';
                $answer = $first * $second;
                break;
            case 2:
                $symbol = '-';
                $answer = $first - $second;
                break;
            default:
                //невозможный вариант
                return;
        }

        $question = "{$first} {$symbol} {$second}";
        $arGame[$question] = $answer;

        $numQuestion++;
    }

    startGame(getRule(), $arGame);
}
