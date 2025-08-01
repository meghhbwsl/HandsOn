<?php
namespace New\PluginTest\Plugin;

use Psr\Log\LoggerInterface;

class AroundPlugin2
{
    protected $logger;
    public function __construct(LoggerInterface $logger) { $this->logger = $logger; }

    public function aroundSave(\Magento\Catalog\Model\Product $subject, callable $proceed)
    {
        $this->logger->info('[AroundPlugin2] Before Save');
        $result = $proceed();
        $this->logger->info('[AroundPlugin2] After Save');
        return $result;
    }
}
