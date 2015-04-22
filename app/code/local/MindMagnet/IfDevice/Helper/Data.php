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

class MindMagnet_IfDevice_Helper_Data extends Mage_Core_Helper_Abstract
{
    private $_userDevice = null;

    /**
     * Check a specific user device - desktop, phone, tablet or string like 'phone|tablet'
     * @param string $forDeviceType
     * @return bool
     */
    public function ifDevice($forDeviceType)
    {
        try {
            $forDeviceType = explode('|', $forDeviceType);

            $userDevice = $this->getUserDevice();

            if (in_array($userDevice, $forDeviceType)){
                return true;
            }

            return false;
        } catch (Exception $e) {
            Mage::log($e);
            return false;
        }
    }

    /**
     * Return the user device - desktop, phone or tablet
     * @return null|string
     */
    public function getUserDevice()
    {
        if (!$this->_userDevice) {
            /* @var $helper MindMagnet_IfDevice_Helper_Mobiledetect */
            $helper = Mage::helper('mindmagnet_ifdevice/mobiledetect');

            $userDevice = 'desktop';

            if($helper->isMobile() && !$helper->isTablet()){
                $userDevice = 'phone';
            } else if ($helper->isTablet()) {
                $userDevice = 'tablet';
            }

            $this->_userDevice = $userDevice;
        }

        return $this->_userDevice;
    }
}
