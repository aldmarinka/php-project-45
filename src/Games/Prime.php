<?php

declare(strict_types=1);

namespace BrainGames\Games;

class Prime implements GameInterface
{
    public function getRule(): string
    {
        return 'Answer "yes" if given number is prime. Otherwise answer "no".';
    }

    public function getQuestion(): string
    {
        return (string)rand(1, 100);
    }

    public function isCorrect(string $question, string $answer): bool
    {
        $correct = $this->getAnswer($question);
        return $answer == $correct;
    }

    public function getAnswer(string $question): string
    {
        $number = (int)$question;
        for ($i = 2; $i < $number; $i++) {
            if ($number % $i == 0) {
                return 'no';
            }
        }

        return 'yes';
    }
}
