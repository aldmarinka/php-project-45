<?php

declare(strict_types=1);

namespace BrainGames\Games;

class Even implements GameInterface
{
    public function getRule(): string
    {
        return 'Answer "yes" if the number is even, otherwise answer "no".';
    }

    public function getQuestion(): int
    {
        return rand(1, 100);
    }

    public function isCorrect(string $question, string $answer): bool
    {
        $correct = $this->getAnswer($question);
        return $answer == $correct;
    }

    public function getAnswer(string $question): string
    {
        return (((int)$question % 2) == 0) ? 'yes' : 'no';
    }
}
