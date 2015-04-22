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

class MindMagnet_IfDevice_Model_Enterprise_PageCache_Processor extends Enterprise_PageCache_Model_Processor
{
    /**
     * Prepare page identifier
     * Add device-type name on cacheId to create different cache for each device type
     *
     * @param string $id
     * @return string
     */
    public function prepareCacheId($id)
    {
        try {
            $helper = new MindMagnet_IfDevice_Helper_Mobiledetect();

            $device = '_DESKTOP';

            if($helper->isMobile() && !$helper->isTablet()){
                $device = '_PHONE';
            } else if ($helper->isTablet()) {
                $device = '_TABLET';
            }

            $cacheId = self::REQUEST_ID_PREFIX . $device .  md5($id . $this->_getScopeCode());

        } catch (exception $e) {
            $cacheId = self::REQUEST_ID_PREFIX . md5($id . $this->_getScopeCode());
        }

        return $cacheId;
    }
}
