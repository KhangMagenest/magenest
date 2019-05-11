<?php
namespace Magenest\Movie\Model\Observer;
use Magento\Framework\Event\ObserverInterface;

class ChangeOrderInfo implements ObserverInterface
{
    /** @var \Psr\Log\LoggerInterface $logger */
    protected $logger;
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $observer->getProduct()->setName('Test Configuration');
        $observer->getProduct()->setIsSuperMode(true);

    }
}