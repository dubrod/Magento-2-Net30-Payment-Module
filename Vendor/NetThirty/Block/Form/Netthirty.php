<?php

namespace Vendor\NetThirty\Block\Form;

/**
 * Block for payment method form
 */
class Netthirty extends \Magento\OfflinePayments\Block\Form\AbstractInstruction
{
    /**
     * template
     *
     * @var string
     */
    protected $_template = 'Adtran_NetThirty::form/netthirty.phtml';
}
