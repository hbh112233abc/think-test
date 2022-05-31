<?php
namespace bingher\test;

class Hello
{
    protected $name = 'bingher';

    public function __construct($name = '')
    {
        if (!empty($name)) {
            $this->name = $name;
        }
    }

    public function say()
    {
        return "hello " . $this->name;
    }

    protected function smile(int $repeat = 1)
    {
        return "hello " . $this->name . ' ' . str_repeat(':)', $repeat);
    }
}
