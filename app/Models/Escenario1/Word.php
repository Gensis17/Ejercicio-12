<?php

declare(strict_types=1);

namespace App\Models\Escenario1;

use InvalidArgumentException;

class Word
{
    private string $text;

    public function __construct(string $text)
    {
        $text = trim($text);

        if ($text === '' || preg_match('/\s/u', $text)) {
            throw new InvalidArgumentException('Una palabra no puede estar vacía ni contener espacios.');
        }

        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function length(): int
    {
        return mb_strlen($this->text);
    }

    public function __toString(): string
    {
        return $this->text;
    }
}