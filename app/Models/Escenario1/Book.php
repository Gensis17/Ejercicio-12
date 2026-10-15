<?php

declare(strict_types=1);

namespace App\Models\Escenario1;

class Book
{
    private string $title;
    private string $author;

    /** @var Chapter[] */
    private array $chapters = [];

    public function __construct(string $title, string $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    /**
     * Crea un capítulo dentro del libro; el número se asigna automáticamente.
     */
    public function addChapter(string $title): Chapter
    {
        $chapter = new Chapter(count($this->chapters) + 1, $title);
        $this->chapters[] = $chapter;

        return $chapter;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    /** @return Chapter[] */
    public function getChapters(): array
    {
        return $this->chapters;
    }

    public function countChapters(): int
    {
        return count($this->chapters);
    }

    public function countWords(): int
    {
        return array_sum(array_map(fn (Chapter $c) => $c->countWords(), $this->chapters));
    }
}