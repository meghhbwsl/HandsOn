<?php
namespace New\PriceLogger\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\Locale\Format;
use Magento\Framework\Currency;
use Psr\Log\LoggerInterface;

class CustomCurrency extends \Magento\Framework\Pricing\Helper\Data
{
    protected $logger;

    public function __construct(
        Context $context,
        PriceCurrencyInterface $priceCurrency,
        Format $localeFormat,
        Currency $currency = null,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        parent::__construct($context, $priceCurrency, $localeFormat, $currency);
    }

    public function currency($value, $includeContainer = true, $precision = 2)
    {
        $this->logger->info('Product Price: ' . $value);
        return parent::currency($value, $includeContainer, $precision);
    }
}
