<?php
namespace New\DependencyDemo\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use New\DependencyDemo\Api\MessageInterface;
use Psr\Log\LoggerInterface;

class Index extends Action
{
    protected $message;
    protected $logger;

    public function __construct(
        Context $context,
        MessageInterface $message,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->message = $message;
        $this->logger = $logger;
    }

    public function execute()
    {
        $msg = $this->message->getMessage();
        $this->logger->info("DI Demo Log: " . $msg);
        echo $msg;
        exit;
    }
}
