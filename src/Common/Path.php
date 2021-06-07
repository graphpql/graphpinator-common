<?php

declare(strict_types = 1);

namespace Graphpinator\Common;

final class Path implements \JsonSerializable
{
    use \Nette\SmartObject;

    public function __construct(
        private array $path = [],
    )
    {
    }

    public function add(string $pathItem) : self
    {
        $this->path[] = $pathItem;

        return $this;
    }

    public function pop() : self
    {
        \array_pop($this->path);

        return $this;
    }

    public function jsonSerialize() : array
    {
        return $this->path;
    }
}
