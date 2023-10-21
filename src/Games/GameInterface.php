<?php

declare(strict_types=1);

namespace BrainGames\Games;

interface GameInterface
{
    public function getRule(): string;
    public function getQuestion(): string;
    public function isCorrect(string $question, string $answer): bool;
    public function getAnswer(string $question): string;
}
