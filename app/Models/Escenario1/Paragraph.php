<?php

declare(strict_types=1);

namespace App\Models\Escenario1;

class Paragraph
{
    /** @var Sentence[] */
    private array $sentences = [];

    public function addSentence(): Sentence
    {
        $sentence = new Sentence();
        $this->sentences[] = $sentence;

        return $sentence;
    }

    /** @return Sentence[] */
    public function getSentences(): array
    {
        return $this->sentences;
    }

    public function countSentences(): int
    {
        return count($this->sentences);
    }

    public function countWords(): int
    {
        return array_sum(array_map(fn (Sentence $s) => $s->countWords(), $this->sentences));
    }

    public function getText(): string
    {
        return implode('. ', array_map(fn (Sentence $s) => $s->getText(), $this->sentences)) . '.';
    }
}