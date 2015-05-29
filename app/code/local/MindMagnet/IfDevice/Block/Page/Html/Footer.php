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

class MindMagnet_IfDevice_Block_Page_Html_Footer extends Mage_Page_Block_Html_Footer
{
    /**
     * Get cache key informative items
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        $helper = new MindMagnet_IfDevice_Helper_Mobiledetect();

        $device = 'DESKTOP_';

        if($helper->isMobile() && !$helper->isTablet()){
            $device = 'PHONE_';
        } else if ($helper->isTablet()) {
            $device = 'TABLET_';
        }

        return array(
            $device.'PAGE_FOOTER',
            Mage::app()->getStore()->getId(),
            (int)Mage::app()->getStore()->isCurrentlySecure(),
            Mage::getDesign()->getPackageName(),
            Mage::getDesign()->getTheme('template'),
            Mage::getSingleton('customer/session')->isLoggedIn()
        );
    }
}
