<?php

declare(strict_types = 1);

namespace Graphpinator\Exception;

interface ClientAware
{
    public function isOutputable() : bool;

    public function getMessage() : string;

    public function getLocation() : ?\Graphpinator\Common\Location;

    public function getPath() : ?\Graphpinator\Common\Path;

    public function getExtensions() : ?array;
}
