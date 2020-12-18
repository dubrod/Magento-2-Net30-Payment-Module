<?php

namespace Vendor\NetThirty\Model;


/**
 * Net30 payment method model
 *
 * @method \Magento\Quote\Api\Data\PaymentMethodExtensionInterface getExtensionAttributes()
 *
 * @api
 * @since 100.0.2
 */

class Netthirty extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_NETTHIRTY_CODE = 'netthirty';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_NETTHIRTY_CODE;

    /**
     * Payment block paths
     *
     * @var string
     */
    protected $_formBlockType = \Vendor\NetThirty\Block\Form\Netthirty::class;

    /**
     * Instructions block path
     *
     * @var string
     */
    protected $_infoBlockType = \Vendor\NetThirty\Block\Info\Instructions::class;

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;

    /**
     * Get instructions text from config
     *
     * @return string
     */
    public function getInstructions()
    {
        return trim($this->getConfigData('instructions'));
    }

}
