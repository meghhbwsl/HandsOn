<?php
namespace New\PluginTest\Plugin;

use Psr\Log\LoggerInterface;

class BeforePlugin1
{
    protected $logger;
    public function __construct(LoggerInterface $logger) { $this->logger = $logger; }

    public function beforeSave(\Magento\Catalog\Model\Product $subject)
    {
        $this->logger->info('[BeforePlugin1] ID: ' . $subject->getId());
        return [];
    }
}
