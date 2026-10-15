<?php

declare(strict_types=1);

namespace App\Models\Escenario1;

class Sentence
{
    /** @var Word[] */
    private array $words = [];

    public function addWord(string $text): Word
    {
        $word = new Word($text);
        $this->words[] = $word;

        return $word;
    }

    public function addWords(string $text): self
    {
        foreach (preg_split('/\s+/u', trim($text), -1, PREG_SPLIT_NO_EMPTY) as $term) {
            $this->addWord($term);
        }

        return $this;
    }

    /** @return Word[] */
    public function getWords(): array
    {
        return $this->words;
    }

    public function countWords(): int
    {
        return count($this->words);
    }

    public function getText(): string
    {
        return implode(' ', array_map(fn (Word $w) => $w->getText(), $this->words));
    }

    public function __toString(): string
    {
        return $this->getText();
    }
}