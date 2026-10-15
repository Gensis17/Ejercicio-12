<?php

declare(strict_types=1);

namespace App\Models\Escenario1;

class Chapter
{
    private int $number;
    private string $title;

    /** @var Paragraph[] */
    private array $paragraphs = [];

    public function __construct(int $number, string $title)
    {
        $this->number = $number;
        $this->title = $title;
    }

    public function addParagraph(): Paragraph
    {
        $paragraph = new Paragraph();
        $this->paragraphs[] = $paragraph;

        return $paragraph;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /** @return Paragraph[] */
    public function getParagraphs(): array
    {
        return $this->paragraphs;
    }

    public function countParagraphs(): int
    {
        return count($this->paragraphs);
    }

    public function countWords(): int
    {
        return array_sum(array_map(fn (Paragraph $p) => $p->countWords(), $this->paragraphs));
    }
}