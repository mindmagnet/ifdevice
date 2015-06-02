**ifdevice** is a Magento extension that based on a PHP Class for device detection allows to do advanced styling for different devices like desktop, mobile or tablet.

#Usage
The module is created on Magento Enterprise ver. 1.14.1.0

####You can check the visitor device directly with
```
Mage::getHelper('mindmagnet_ifdevice')->getUserDevice();
```
This method will return visitor device a string value ('desktop', 'phone' or 'tablet')


```
Mage::getHelper('mindmagnet_ifdevice')->ifDevice('device_type');
```
Device type can be: 'desktop', 'phone', 'tablet' or 'phone|tablet' for both devices and the return of this method in boolean

####Or you can use one of this 2 new layout nodes
**Use 'ifdevice' for action and blocks**
Example:
```
<action method="setTemplate" ifdevice="phone|tablet">
<template>page/...</template></action>
<block type="catalog/navigation" name="catalog.cntnav" ifdevice="phone|tablet" ... />
```
**'ifconfig' for blocks**
Example:
```
<block type="banners/index" name="banners_home_main" ifconfig="banners/config.../>
```

##Full Page Cache
To work with Magento Enterprise FPC you need to set under 'public_html/app/etc/local.xml':
```
<global>
    ...
    <cache>
        <request_processors>
            <ee>MindMagnet_IfDevice_Model_Enterprise_PageCache_Processor</ee>
        </request_processors>
    </cache>
</global>
```
##Instalation exemple with composer
```
{
    "require": {
        "magento-hackathon/magento-composer-installer":"dev-master",
        "mindmagnet/mindmagnet-ifdevice": "*"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/magento-hackathon/magento-composer-installer"
        },
        {
            "type": "vcs",
            "url": "https://github.com/mindmagnet/mindmagnet-ifdevice.git"
        }
    ],
    "extra":{
        "magento-root-dir": "./"
    }
}
```

#Feedback
If you find any issues or have any suggestions, please get in touch with us through [our site](http://www.mindmagnetsoftware.com)