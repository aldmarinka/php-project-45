<?php

declare(strict_types=1);

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\COUNT_QUESTIONS;

function getRule(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function play(): void
{
    $gameRounds      = [];

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $number = rand(1, 100);

        $gameRounds[$number] = isPrime($number) ? 'yes' : 'no';
    }

    startGame(getRule(), $gameRounds);
}

function isPrime(int $number): bool
{
    if ($number === 1) {
        return false;
    }

    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}
