<?php

declare(strict_types=1);

namespace Brain\Games\Even;

use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const RULE_GAME = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function playGame(): void
{
    $questionsAndAnswers = [];

    for ($round = 1; $round <= NUMBER_ROUNDS; $round++) {
        $number = rand(0, 100);

        $questionsAndAnswers[$round]['question'] = "Question: {$number}";
        $questionsAndAnswers[$round]['answer'] = isEven($number) ? 'yes' : 'no';
    }

    playingGame(RULE_GAME, $questionsAndAnswers);
}
