<?php

declare(strict_types = 1);

namespace Graphpinator\Tests\Unit;

final class LocationTest extends \PHPUnit\Framework\TestCase
{
    public function testSimple() : void
    {
        $location = new \Graphpinator\Common\Location(10, 100);

        self::assertSame(10, $location->getLine());
        self::assertSame(100, $location->getColumn());
    }

    public function testSerialize() : void
    {
        $location = new \Graphpinator\Common\Location(10, 100);

        self::assertSame(['line' => 10, 'column' => 100], $location->jsonSerialize());
    }
}
