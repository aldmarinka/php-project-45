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
    $gameRounds = [];

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $first  = rand(0, 100);
        $second = rand(0, 100);

        $operations = ['+', '*', '-'];
        $symbol = $operations[array_rand($operations)];

        $answer     = match ($symbol) {
            '+' => $first + $second,
            '*' => $first * $second,
            '-' => $first - $second,
            default => throw new \Exception("Неизвестная математическая операция"),
        };

        $question          = "{$first} {$symbol} {$second}";
        $gameRounds[$question] = $answer;
    }

    startGame(getRule(), $gameRounds);
}
