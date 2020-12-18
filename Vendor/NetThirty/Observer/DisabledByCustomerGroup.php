<?php
namespace Vendor\NetThirty\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ObjectManager;

class DisabledByCustomerGroup implements ObserverInterface
{
    protected $_scopeConfig;

    public function __construct(
      \Psr\Log\LoggerInterface $logger,
      \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->_logger = $logger;
        $this->_scopeConfig = $scopeConfig;
    }
    /**
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $result          = $observer->getEvent()->getResult();
        $method_instance = $observer->getEvent()->getMethodInstance();
        $quote           = $observer->getEvent()->getQuote();

        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
        $group = $this->_scopeConfig->getValue("payment/netthirty/group", $storeScope); //single interger or 1,2 if multichoice
        $group_arr = explode(",",$group);

        //$this->_logger->info($method_instance->getCode());
        //$this->_logger->info('config_group');
        //$this->_logger->info($group);


        /* If Cusomer  group is match then work */
        if (null !== $quote && !in_array($quote->getCustomerGroupId(),$group_arr)) {
            /* Disable All payment gateway  exclude Your payment Gateway*/
            if ($method_instance->getCode() == 'netthirty') {
                $result->setData('is_available', false);
            }
        }

    }
}
