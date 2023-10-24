<?php

declare(strict_types=1);

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\COUNT_QUESTIONS;

function getRule(): string
{
    return 'What is the result of the expression?';
}

function play(): void
{
    $arGame = [];

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
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
                throw new \Exception("Неизвестная математическая операция");
        }

        $question          = "{$first} {$symbol} {$second}";
        $arGame[$question] = $answer;
    }

    startGame(getRule(), $arGame);
}
