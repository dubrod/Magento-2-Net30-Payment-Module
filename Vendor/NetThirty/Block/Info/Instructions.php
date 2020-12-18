<?php

namespace Vendor\NetThirty\Block\Info;

/**
 * Block for payment generic info
 *
 * @api
 * @since 100.0.2
 */
class Instructions extends \Magento\Payment\Block\Info
{
    /**
     * Instructions text
     *
     * @var string
     */
    protected $_instructions;

    /**
     * @var string
     */
    protected $_template = 'Adtran_NetThirty::info/instructions.phtml';

    /**
     * Get instructions text from order payment
     * (or from config, if instructions are missed in payment)
     *
     * @return string
     */
    public function getInstructions()
    {
        if ($this->_instructions === null) {
            $this->_instructions = $this->getInfo()->getAdditionalInformation(
                'instructions'
            ) ?: trim($this->getMethod()->getConfigData('instructions'));
        }
        return $this->_instructions;
    }
}
