<?php
namespace New\ProxyTest\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Psr\Log\LoggerInterface;

class Test extends Action
{
    protected $logger;

    public function __construct(Context $context, LoggerInterface $logger)
    {
        parent::__construct($context);
        $this->logger = $logger;
    }

    public function execute()
    {
        $this->logger->debug('Logging from controller via Proxy Logger!');
        echo 'Log written to var/log/cart_debug.log';
    }
}
