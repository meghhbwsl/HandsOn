<?php
namespace New\VirtualBasic\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use New\VirtualBasic\Model\Greeter;

class Test extends Action
{
    protected $greeter;

    public function __construct(Context $context, Greeter $greeter)
    {
        $this->greeter = $greeter;
        parent::__construct($context);
    }

    public function execute()
    {
        echo $this->greeter->greet();
        exit;
    }
}
