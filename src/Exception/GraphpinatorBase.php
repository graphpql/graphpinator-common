<?php

declare(strict_types = 1);

namespace Graphpinator\Exception;

abstract class GraphpinatorBase extends \Exception implements \JsonSerializable
{
    public const MESSAGE = '';

    protected array $messageArgs = [];
    protected ?\Graphpinator\Common\Location $location = null;
    protected ?\Graphpinator\Common\Path $path = null;
    protected ?array $extensions = null;

    public function __construct(
        ?\Graphpinator\Common\Location $location = null,
        ?\Graphpinator\Common\Path $path = null,
        ?array $extensions = null
    )
    {
        parent::__construct(\sprintf(static::MESSAGE, ...$this->messageArgs));

        $this->location = $location;
        $this->path = $path;
        $this->extensions = $extensions;
    }

    public static function notOutputableResponse() : array
    {
        return [
            'message' => 'Server responded with unknown error.',
        ];
    }

    final public function jsonSerialize() : array
    {
        if (!$this->isOutputable()) {
            return self::notOutputableResponse();
        }

        $result = [
            'message' => $this->getMessage(),
        ];

        if ($this->location instanceof \Graphpinator\Common\Location) {
            $result['locations'] = [$this->location];
        }

        if ($this->path instanceof \Graphpinator\Common\Path) {
            $result['path'] = $this->path;
        }

        if (\is_array($this->extensions)) {
            $result['extensions'] = $this->extensions;
        }

        return $result;
    }

    protected function isOutputable() : bool
    {
        return false;
    }
}
