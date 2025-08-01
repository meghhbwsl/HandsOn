<?php
namespace New\DependencyDemo\Model;

use New\DependencyDemo\Api\MessageInterface;

class Message implements MessageInterface
{
    public function getMessage(): string
    {
        return "Dependency Injection works!";
    }
}
