<?php

namespace Magento\Store\Model;

/**
 * Fake stores
 */
class StoreManager implements StoreManagerInterface
{
    /**
     * Application run code
     */
    public const PARAM_RUN_CODE = 'MAGE_RUN_CODE';

    /**
     * Application run type (store|website)
     */
    public const PARAM_RUN_TYPE = 'MAGE_RUN_TYPE';

    public function setIsSingleStoreModeAllowed($value)
    {
        // TODO: Implement setIsSingleStoreModeAllowed() method.
    }

    public function hasSingleStore()
    {
        return true;
    }

    public function isSingleStoreMode()
    {
        // TODO: Implement isSingleStoreMode() method.
    }

    public function getStore($storeId = null)
    {
        // TODO: Implement getStore() method.
    }

    public function getStores($withDefault = false, $codeKey = false)
    {
        // TODO: Implement getStores() method.
    }

    public function getWebsite($websiteId = null)
    {
        // TODO: Implement getWebsite() method.
    }

    public function getWebsites($withDefault = false, $codeKey = false)
    {
        // TODO: Implement getWebsites() method.
    }

    public function reinitStores()
    {
        // TODO: Implement reinitStores() method.
    }

    public function getDefaultStoreView()
    {
        // TODO: Implement getDefaultStoreView() method.
    }

    public function getGroup($groupId = null)
    {
        // TODO: Implement getGroup() method.
    }

    public function getGroups($withDefault = false)
    {
        // TODO: Implement getGroups() method.
    }

    public function setCurrentStore($store)
    {
        // TODO: Implement setCurrentStore() method.
    }
}
