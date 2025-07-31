<?php
namespace New\VirtualBasic\Model;

class Greeter
{
    protected $name;

    public function __construct(string $name = "Default User")
    {
        $this->name = $name;
    }

    public function greet()
    {
        return "Hello, " . $this->name . "!";
    }
}
