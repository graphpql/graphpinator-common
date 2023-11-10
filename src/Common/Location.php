<?php

declare(strict_types = 1);

namespace Graphpinator\Common;

final class Location implements \JsonSerializable
{
    public function __construct(
        private int $line,
        private int $column,
    )
    {
    }

    public function jsonSerialize() : array
    {
        return [
            'line' => $this->line,
            'column' => $this->column,
        ];
    }

    public function getLine() : int
    {
        return $this->line;
    }

    public function getColumn() : int
    {
        return $this->column;
    }
}
