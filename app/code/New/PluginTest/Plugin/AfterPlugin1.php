<?php
namespace New\PluginTest\Plugin;

use Psr\Log\LoggerInterface;

class AfterPlugin1
{
    protected $logger;
    public function __construct(LoggerInterface $logger) { $this->logger = $logger; }

    public function afterSave(\Magento\Catalog\Model\Product $subject, $result)
    {
        $this->logger->info('[AfterPlugin1] Saved Product ID: ' . $subject->getId());
        return $result;
    }
}
