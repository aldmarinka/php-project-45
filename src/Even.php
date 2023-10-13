<?php

declare(strict_types=1);

namespace BrainGames\Even;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function startGame(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $question = 0;
    while ($question < 3) {
        $number = rand(0, 100);
        $answer = prompt('Question: ' . $number);
        line("Your answer: %s", $answer);
        $question++;

        $correct = (($number % 2) == 0) ? 'yes' : 'no';
        if ($answer != $correct) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correct);
            line("Let's try again, %s!", $name);

            return;
        }

        line('Correct!');
    }

    line("Congratulations, %s!", $name);

    return;
}
