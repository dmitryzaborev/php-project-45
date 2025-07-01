<?php

declare(strict_types=1);

namespace Brain\Games\Calc;

use function Brain\Games\Engine\playingGame;

use const Brain\Games\Engine\NUMBER_ROUNDS;

const RULE_GAME = 'What is the result of the expression?';

function calculate(int $number1, string $operation, int $number2): int
{
    return match ($operation) {
        '+' => $number1 + $number2,
        '-' => $number1 - $number2,
        '*' => $number1 * $number2,
        default => throw new \InvalidArgumentException("Unsupported operation: $operation"),
    };
}

function playGame(): void
{
    $questionsAndAnswers = [];
    $arrayOperations = ['+', '-', '*'];

    for ($round = 1; $round <= NUMBER_ROUNDS; $round++) {
        $number1 = rand(0, 100);
        $number2 = rand(0, 100);
        $operation = $arrayOperations[array_rand($arrayOperations)];

        $questionsAndAnswers[$round]['question'] = "Question: {$number1} {$operation} {$number2}";
        $questionsAndAnswers[$round]['answer'] = (string) calculate($number1, $operation, $number2);
    }

    playingGame(RULE_GAME, $questionsAndAnswers);
}
