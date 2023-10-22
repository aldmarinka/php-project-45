<?php

declare(strict_types=1);

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getCountQuestion;

function getRule(): string
{
    return 'What number is missing in the progression?';
}

function play(): void
{
    $arGame      = [];
    $numQuestion = 0;

    while ($numQuestion < getCountQuestion()) {
        // Генерируем случайную длину прогрессии от 5 до 10 чисел
        $length = rand(5, 10);

        // Генерируем случайный первый элемент прогрессии
        $firstElement = rand(1, 10);

        // Генерируем случайный шаг прогрессии
        $step = rand(1, 5);

        // Генерируем случайный номер, который заменим точками
        $hiddenNumber = rand(0, $length - 1);

        $progression   = [];
        $hiddenElement = 0;
        for ($i = 0; $i < $length; $i++) {
            $element = $firstElement + $i * $step;

            if ($i == $hiddenNumber) {
                $hiddenElement = $element;

                $element = '..';
            }
            $progression[] = $element;
        }

        $strProgression = implode(' ', $progression);

        $arGame[$strProgression] = $hiddenElement;
        $numQuestion++;
    }

    startGame(getRule(), $arGame);
}
