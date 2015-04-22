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

class MindMagnet_IfDevice_Model_Enterprise_PageCache_Container_Advanced_Quote extends  Enterprise_PageCache_Model_Container_Advanced_Quote
{
    /**
     * Get container individual additional cache id
     * Add device-type name on additional cacheId to create different cache for each device type - sidebar
     *
     * @return string
     */
    protected function _getAdditionalCacheId()
    {
        try {
            $helper = new MindMagnet_IfDevice_Helper_Mobiledetect();

            $device = 'DESKTOP_';

            if($helper->isMobile() && !$helper->isTablet()){
                $device = 'PHONE_';
            } else if ($helper->isTablet()) {
                $device = 'TABLET_';
            }

            return md5($device . $this->_placeholder->getName() . '_' . $this->_placeholder->getAttribute('cache_id'));

        } catch (exception $e) {
            return parent::_getAdditionalCacheId();
        }

        return parent::_getAdditionalCacheId();
    }
}
