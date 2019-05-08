<?php
namespace Magenest\Movie\Model\Observer;
use Magento\Framework\Event\ObserverInterface;

class ChangeFirstnameObserver implements ObserverInterface
{
    /** @var \Psr\Log\LoggerInterface $logger */
    protected $logger;
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getCustomer();
        $customer->setFirstName('Magenest');
        $this->logger->debug($customer->getFirstname());
    }
}