<?php

declare(strict_types=1);

namespace BrainGames\Games;

class Calc implements GameInterface
{
    public function getRule(): string
    {
        return 'What is the result of the expression?';
    }

    public function getQuestion(): string
    {
        $symbol = match (rand(0, 2)) {
            0 => '+',
            1 => '-',
            2 => '*',
            default => '',
        };

        return rand(0, 100) . ' ' . $symbol . ' ' . rand(0, 100);
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
        $second = (int)$expression[2];


        return (string)match ($expression[1]) {
            '+' => $first + $second,
            '-' => $first - $second,
            '*' => $first * $second,
        };
    }
}
