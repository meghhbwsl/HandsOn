<?php
namespace New\ProxyTest\Model;

use Magento\Checkout\Helper\Cart;
use Psr\Log\LoggerInterface;
use Stringable;

class CartLogger implements LoggerInterface
{
    protected $cartHelper;

    public function __construct(Cart $cartHelper)
    {
        $this->cartHelper = $cartHelper;
    }

    public function emergency(Stringable|string $message, array $context = []): void {}
    public function alert(Stringable|string $message, array $context = []): void {}
    public function critical(Stringable|string $message, array $context = []): void {}
    public function error(Stringable|string $message, array $context = []): void {}
    public function warning(Stringable|string $message, array $context = []): void {}
    public function notice(Stringable|string $message, array $context = []): void {}
    public function info(Stringable|string $message, array $context = []): void {}

    public function debug(Stringable|string $message, array $context = []): void
    {
        $itemCount = $this->cartHelper->getSummaryCount();
        file_put_contents(BP . '/var/log/cart_debug.log',
            "[Cart Debug] Items in cart: $itemCount | Message: $message\n",
            FILE_APPEND
        );
    }

    public function log($level, Stringable|string $message, array $context = []): void
    {
        $this->debug("[$level] $message", $context);
    }
}
