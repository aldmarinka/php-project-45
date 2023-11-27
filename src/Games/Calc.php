<?php

declare(strict_types=1);

namespace BrainGames\Games\Calc;

use Exception;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\COUNT_QUESTIONS;

function getRule(): string
{
    return 'What is the result of the expression?';
}

function play(): void
{
    $gameRounds = [];

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $first  = rand(0, 100);
        $second = rand(0, 100);

        $operations = ['+', '*', '-'];
        $symbol = $operations[array_rand($operations)];

        switch ($symbol) {
            case '+':
                $answer = $first + $second;
                break;
            case '*':
                $answer = $first * $second;
                break;
            case '-':
                $answer = $first - $second;
                break;
            default:
                throw new \Exception("Неизвестная математическая операция");
        }

        $question          = "{$first} {$symbol} {$second}";
        $gameRounds[$question] = $answer;
    }

    startGame(getRule(), $gameRounds);
}
