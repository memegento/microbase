<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Directory\Helper;

/**
 * Directory data helper
 *
 * @api
 * @since 100.0.2
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Data
{
    private const STORE_ID = 'store_id';

    /**
     * Config value that lists ISO2 country codes which have optional Zip/Postal pre-configured
     */
    public const OPTIONAL_ZIP_COUNTRIES_CONFIG_PATH = 'general/country/optional_zip_countries';

    /**
     * Path to config value, which lists countries, for which state is required.
     */
    public const XML_PATH_STATES_REQUIRED = 'general/region/state_required';

    /**
     * Path to config value, which detects whether or not display the state for the country, if it is not required
     */
    public const XML_PATH_DISPLAY_ALL_STATES = 'general/region/display_all';

    /**#@+
     * Path to config value, which is default country
     */
    public const XML_PATH_DEFAULT_COUNTRY = 'general/country/default';
    public const XML_PATH_DEFAULT_LOCALE = 'general/locale/code';
    public const XML_PATH_DEFAULT_TIMEZONE = 'general/locale/timezone';
    /**#@-*/

    /**
     * Path to config value that contains codes of the most used countries.
     * Such countries can be shown on the top of the country list.
     */
    public const XML_PATH_TOP_COUNTRIES = 'general/country/destinations';

    /**
     * Path to config value that contains weight unit
     */
    public const XML_PATH_WEIGHT_UNIT = 'general/locale/weight_unit';
}
