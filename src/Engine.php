<?php

declare(strict_types=1);

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_QUESTIONS = 3;

function getCountQuestion(): int
{
    return COUNT_QUESTIONS;
}

function startGame(string $rule, array $arGame): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($rule);

    foreach ($arGame as $roundQuestion => $roundAnswer) {
        $userAnswer = prompt('Question: ' . $roundQuestion);
        line("Your answer: %s", $userAnswer);

        if ($userAnswer != $roundAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $roundAnswer);
            line("Let's try again, %s!", $name);

            return;
        }

        line('Correct!');
    }

    line("Congratulations, %s!", $name);

    return;
}
