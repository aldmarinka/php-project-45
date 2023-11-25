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
    $arGame      = [];

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $number = rand(1, 100);

        $arGame[$number] = isPrime($number);
    }

    startGame(getRule(), $arGame);
}

function isPrime(int $number): string
{
    if ($number === 1) {
        return 'no';
    }

    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            return 'no';
        }
    }

    return 'yes';
}
