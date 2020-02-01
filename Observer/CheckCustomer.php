<?php
/**
 * Author: Chandravadana Kandregula.
 * Dated: 01 Feb 2020
 */

namespace Chandu\M2Concepts\Observer;

use Magento\Framework\App\Http\Context;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\LayoutInterface;
use Psr\Log\LoggerInterface;

class CheckCustomer implements ObserverInterface
{
    /**
     * @var Context
     */
    private $httpContext;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * CheckCustomer constructor.
     * @param Context $httpContext
     * @param LoggerInterface $logger
     */
    public function __construct(Context $httpContext,
                                LoggerInterface $logger)
    {
        $this->httpContext = $httpContext;
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     * @return $this
     */
    public function execute(Observer $observer)
    {
        if ($this->isCustomerLoggedIn()) {
            try {
                /** @var LayoutInterface $layout */
                $layout = $observer->getData('layout');
                $layout->getUpdate()->addHandle('customer_logged_in');
            } catch (\Exception $e) {
                // Just log the exception and continue with stopping the full page layout
                $this->logger->debug("Unable to add new handle due to exception: ". $e->getMessage());
                return $this;
            }
        }
        return $this;
    }

    /**
     * @return bool
     */
    public function isCustomerLoggedIn()
    {
        return $this->httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
    }
}
