<?php

declare(strict_types=1);

namespace BrainGames\Engine;

use BrainGames\Games\GameInterface;

use function cli\line;
use function cli\prompt;

function startGame(GameInterface $operation): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($operation->getRule());

    $numQuestion = 0;
    while ($numQuestion < 3) {
        $question = $operation->getQuestion();

        $answer = prompt('Question: ' . $question);
        line("Your answer: %s", $answer);

        if (!$operation->isCorrect($question, $answer)) {
            $correct = $operation->getAnswer($question);

            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correct);
            line("Let's try again, %s!", $name);

            return;
        }

        line('Correct!');


        $numQuestion++;
    }

    line("Congratulations, %s!", $name);

    return;
}
