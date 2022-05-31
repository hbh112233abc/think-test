# PHPUnit For ThinkPHP6

## Install
```shell
composer require bingher/think-test
```

## Usage
### Add test case `/test/Test.php`
```php
<?php

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

```

### Run test case
#### win
```shell
./vendor/bin/tpt.bat ./test/Test.php
```
#### unix
```shell
./vendor/bin/tpt ./test/Test.php
```

### More
#### Wait Test Class `test/Hello.php`
```php
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

```
#### Test Case `test/HelloTest.php`
```php
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

```
