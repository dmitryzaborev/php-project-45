<?php

declare(strict_types=1);

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const RULE_GAME = 'Find the greatest common divisor of given numbers.';

function findGcd(int $a, int $b): int
{
    while ($b !== 0) {
        [$a, $b] = [$b, $a % $b];
    }
    return abs($a);
}

function playGame(): void
{
    $questionsAndAnswers = [];

    for ($round = 1; $round <= NUMBER_ROUNDS; $round++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);

        $questionsAndAnswers[$round]['question'] = "Question: {$number1} {$number2}";
        $questionsAndAnswers[$round]['answer'] = (string) findGcd($number1, $number2);
    }

    playingGame(RULE_GAME, $questionsAndAnswers);
}
