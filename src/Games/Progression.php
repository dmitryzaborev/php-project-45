<?php

declare(strict_types=1);

namespace Brain\Games\Progression;

use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const RULE_GAME = 'What number is missing in the progression?';

function findHidInProgres(int $firstNum, int $step, int $hiddenPos): int
{
    return $firstNum + ($step * $hiddenPos);
}

function playGame(): void
{
    $questionsAndAnswers = [];

    for ($round = 1; $round <= NUMBER_ROUNDS; $round++) {
        $numFirst = rand(0, 100);
        $step = rand(1, 10); // Лучше ограничить разумным шагом
        $lengthProgression = rand(5, 10);

        $hiddenPos = rand(0, $lengthProgression - 1); // Индексация с 0

        // Генерируем прогрессию
        $progression = [];
        for ($i = 0; $i < $lengthProgression; $i++) {
            $progression[] = ($i === $hiddenPos) ? '..' : (string) ($numFirst + $step * $i);
        }

        // Собираем строку с пробелами
        $question = 'Question: ' . implode(' ', $progression);
        $answer = (string) findHidInProgres($numFirst, $step, $hiddenPos);

        $questionsAndAnswers[$round]['question'] = $question;
        $questionsAndAnswers[$round]['answer'] = $answer;
    }

    playingGame(RULE_GAME, $questionsAndAnswers);
}
