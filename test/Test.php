<?php
namespace bingher\test;

use bingher\ThinkTest\ThinkTest;

class Test extends ThinkTest
{
    public function testTap()
    {
        $result = tap('world');
        $this->assertEquals($result, 'world');
        $result = tap('world', null);
        $this->assertEquals($result, 'world');
        $result = tap(
            'world',
            function ($v) {
                $v = 'hello ' . $v;
            }
        );
        $this->assertEquals($result, 'world');
        $result = tap(
            'world',
            function (&$v) {
                $v = 'hello ' . $v;
            }
        );
        $this->assertEquals($result, 'hello world');
    }
}
