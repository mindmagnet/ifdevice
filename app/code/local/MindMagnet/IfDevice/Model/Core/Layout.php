<?php

/**
 * MindMagnet Software - The leading Magento Solution Partner
 *
 * MindMagnet IfDevice
 *
 * @author    Rastasan Mihai <mihai.rastasan@mindmagnetsoftware.com>
 * @package   MindMagnet_IfDevice
 * @copyright Copyright (c) 2015 MindMagnet SRL (http://www.mindmagnetsoftware.com)
 */

class MindMagnet_IfDevice_Model_Core_Layout extends Mage_Core_Model_Layout
{
    /**
     * Check|validate 'ifdevice' node on 'action' node
     *
     * @param Varien_Simplexml_Element $node
     * @param Varien_Simplexml_Element $parent
     * @return MindMagnet_IfDevice_Model_Core_Layout|Mage_Core_Model_Layout
     */
    protected function _generateAction($node, $parent)
    {
        if (isset($node['ifdevice']) && ($deviceType = (string)$node['ifdevice'])) {
            /* @var $helper MindMagnet_IfDevice_Helper_Data */
            $helper = Mage::helper('mindmagnet_ifdevice');

            if (!$helper->ifDevice($deviceType)) {
                return $this;
            }
        }
        return parent::_generateAction($node, $parent);
    }

    /**
     * Check|validate 'ifdevice' and 'ifconfig' nodes on 'block' node
     *
     * @param Varien_Simplexml_Element $node
     * @param Varien_Simplexml_Element $parent
     * @return $this|Mage_Core_Model_Layout
     */
    protected function _generateBlock($node, $parent)
    {
        if (isset($node['ifconfig']) && ($configPath = (string)$node['ifconfig'])) {
            if (!Mage::getStoreConfigFlag($configPath)) {
                return $this;
            }
        }

        if (isset($node['ifdevice']) && ($deviceType = (string)$node['ifdevice'])) {
            /* @var $helper MindMagnet_IfDevice_Helper_Data */
            $helper = Mage::helper('mindmagnet_ifdevice');

            if (!$helper->ifDevice($deviceType)) {
                return $this;
            }
        }

        return parent::_generateBlock($node, $parent);
    }
}
