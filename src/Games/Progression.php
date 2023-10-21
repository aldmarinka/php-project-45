<?php

declare(strict_types=1);

namespace BrainGames\Games;

class Progression implements GameInterface
{
    public function getRule(): string
    {
        return 'What number is missing in the progression?';
    }

    public function getQuestion(): string
    {
        // Генерируем случайную длину прогрессии от 5 до 10 чисел
        $length = rand(5, 10);

        // Генерируем случайный первый элемент прогрессии
        $firstElement = rand(1, 10);

        // Генерируем случайный шаг прогрессии
        $step = rand(1, 5);

        // Генерируем случайный номер, который заменим точками
        $hiddenNumber = rand(0, $length - 1);

        $progression = array();

        for ($i = 0; $i < $length; $i++) {
            $element = $firstElement + $i * $step;

            if ($i == $hiddenNumber) {
                $element = '..';
            }
            $progression[] = $element;
        }

        return implode(' ', $progression);
    }

    public function isCorrect(string $question, string $answer): bool
    {
        $correct = $this->getAnswer($question);
        return $answer == $correct;
    }

    public function getAnswer(string $question): string
    {
        $progression = explode(' ', $question);

        $hiddenIndex = array_search('..', $progression);

        if ($hiddenIndex == 0) {
            $diff          = $progression[2] - $progression[1];
            $missingNumber = $progression[1] - $diff;

            return (string)$missingNumber;
        }

        if ($hiddenIndex == 1) {
            $diff          = $progression[3] - $progression[2];
            $missingNumber = (int)$progression[0] + (int)$diff;

            return (string)$missingNumber;
        }

        $diff          = $progression[1] - $progression[0];
        $missingNumber = (int)$progression[$hiddenIndex - 1] + (int)$diff;

        return (string)$missingNumber;
    }
}
