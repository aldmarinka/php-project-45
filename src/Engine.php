<?php

declare(strict_types=1);

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_QUESTIONS = 3;

function startGame(string $rule, array $gameRound): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($rule);

    foreach ($gameRound as $roundQuestion => $roundAnswer) {
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
}
