<?php
namespace bingher\test;

use bingher\ThinkTest\ThinkTest;

class HelloTest extends ThinkTest
{
    public function testSay()
    {
        $hello = new Hello;
        //use prop function get protected properties
        $name = $this->prop($hello, 'name');
        $this->assertEquals($name, 'bingher');

        $result = $hello->say();
        $this->assertEquals($result, 'hello bingher');
    }

    public function testSmile()
    {
        $hello = new Hello('mondy');
        //use prop function get protected properties
        $name = $this->prop($hello, 'name');
        $this->assertEquals($name, 'mondy');
        //use call function run protected function
        $result = $this->call($hello, 'smile');
        $this->assertEquals($result, 'hello mondy :)');
        //add params
        $result = $this->call($hello, 'smile', [2]);
        $this->assertEquals($result, 'hello mondy :):)');
        //use prop function set protected properties value
        $this->prop($hello, 'name', 'everyone');
        $name = $this->prop($hello, 'name');
        $this->assertEquals($name, 'everyone');
    }
}
