# PHPUnit For ThinkPHP6

## Install
```
composer require bingher/think-test
```

## Usage
### Add test case `/test/Test.php`
```
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
```
./vendor/bin/tpt.bat ./test/Test.php
```
#### unix
```
./vendor/bin/tpt ./test/Test.php
```
