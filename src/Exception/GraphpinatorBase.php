<?php

declare(strict_types = 1);

namespace Graphpinator\Exception;

abstract class GraphpinatorBase extends \Exception implements ClientAware
{
    public const MESSAGE = '';

    protected ?\Graphpinator\Common\Location $location = null;
    protected ?\Graphpinator\Common\Path $path = null;
    protected ?array $extensions = null;

    public function __construct(array $messageArgs = [])
    {
        parent::__construct(\sprintf(static::MESSAGE, ...$messageArgs));
    }

    public function getLocation() : ?\Graphpinator\Common\Location
    {
        return $this->location;
    }

    public function setLocation(\Graphpinator\Common\Location $location) : static
    {
        $this->location = $location;

        return $this;
    }

    public function getPath() : ?\Graphpinator\Common\Path
    {
        return $this->path;
    }

    public function setPath(\Graphpinator\Common\Path $path) : static
    {
        $this->path = $path;

        return $this;
    }

    public function getExtensions() : ?array
    {
        return $this->extensions;
    }

    public function setExtensions(array $extensions) : static
    {
        $this->extensions = $extensions;

        return $this;
    }

    public function isOutputable() : bool
    {
        return false;
    }
}
