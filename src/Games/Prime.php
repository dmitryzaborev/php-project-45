<?php

declare(strict_types=1);

namespace Brain\Games\Prime;

use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const RULE_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2, $sqrt = (int) sqrt($num); $i <= $sqrt; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function playGame(): void
{
    $questionsAndAnswers = [];

    for ($round = 1; $round <= NUMBER_ROUNDS; $round++) {
        $number = rand(0, 100);

        $questionsAndAnswers[$round]['question'] = "Question: {$number}";
        $questionsAndAnswers[$round]['answer'] = isPrime($number) ? 'yes' : 'no';
    }

    playingGame(RULE_GAME, $questionsAndAnswers);
}
