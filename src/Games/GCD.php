<?php

declare(strict_types=1);

namespace BrainGames\Games;

class GCD implements GameInterface
{
    public function getRule(): string
    {
        return 'Find the greatest common divisor of given numbers.';
    }

    public function getQuestion(): string
    {
        return rand(0, 100) . ' ' . rand(0, 100);
    }

    public function isCorrect(string $question, string $answer): bool
    {
        $correct = $this->getAnswer($question);
        return $answer == $correct;
    }

    public function getAnswer(string $question): string
    {
        $expression = explode(' ', $question);
        $first = (int)$expression[0];
        $second = (int)$expression[1];

        while ($second != 0) {
            $remainder = $first % $second;
            $first = $second;
            $second = $remainder;
        }

        return (string)abs($first);
    }
}
