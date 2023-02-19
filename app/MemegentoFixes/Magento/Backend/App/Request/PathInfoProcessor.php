<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Backend\App\Request;

use Magento\Framework\App\Request\PathInfoProcessorInterface;
use Magento\Framework\App\RequestInterface;

/**
 * Prevents path info processing for admin store
 *
 * @api
 * @since 100.0.2
 */
class PathInfoProcessor implements PathInfoProcessorInterface
{

    /**
     * Process path info
     *
     * @param RequestInterface $request
     * @param string $pathInfo
     * @return string
     */
    public function process(RequestInterface $request, $pathInfo)
    {
        $firstPart = $pathInfo === null ? '' :
            explode('/', ltrim($pathInfo, '/'), 2)[0];
        //TODO: implement custom path processor
        return $pathInfo;
    }
}
