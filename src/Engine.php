<?php

declare(strict_types=1);

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_ROUNDS = 3;

function playRound(string $question, string $rightAnswer): bool
{
    line($question);
    $answer = prompt('Your answer');

    if ($rightAnswer === $answer) {
        line('Correct!');
        return true;
    }

    line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $rightAnswer);
    return false;
}

function playingGame(string $rule, array $questionsAndAnswers): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line($rule);

    foreach ($questionsAndAnswers as $questionAndAnswer) {
        $isCorrect = playRound(
            $questionAndAnswer['question'],
            (string) $questionAndAnswer['answer']
        );

        if (!$isCorrect) {
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line('Congratulations, %s!', $name);
}
