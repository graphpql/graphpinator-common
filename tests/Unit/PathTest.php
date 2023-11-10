<?php

declare(strict_types = 1);

namespace Graphpinator\Tests\Unit;

final class PathTest extends \PHPUnit\Framework\TestCase
{
    public function testSimple() : void
    {
        $path = new \Graphpinator\Common\Path();

        self::assertSame('[]', \Infinityloop\Utils\Json::fromNative($path->jsonSerialize())->toString());

        $path->add('first');
        $path->add('second');

        self::assertSame('["first","second"]', \Infinityloop\Utils\Json::fromNative($path->jsonSerialize())->toString());

        $path->pop();

        self::assertSame('["first"]', \Infinityloop\Utils\Json::fromNative($path->jsonSerialize())->toString());
    }
}
