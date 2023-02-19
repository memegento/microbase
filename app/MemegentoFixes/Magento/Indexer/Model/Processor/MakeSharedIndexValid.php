<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\Indexer\Model\Processor;

use Magento\Framework\Indexer\ConfigInterface;
use Magento\Framework\Indexer\IndexerRegistry;

/**
 * Class processor makes indexers valid by shared index ID
 */
class MakeSharedIndexValid
{
    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @var IndexerRegistry
     */
    private $indexerRegistry;

    /**
     * ValidateSharedIndex constructor.
     *
     * @param ConfigInterface $config
     * @param IndexerRegistry $indexerRegistry
     */
    public function __construct(ConfigInterface $config, IndexerRegistry $indexerRegistry)
    {
        $this->config = $config;
        $this->indexerRegistry = $indexerRegistry;
    }

    /**
     * Validate indexers by shared index ID
     *
     * @param string $sharedIndex
     * @return bool
     * @throws \Exception
     */
    public function execute(string $sharedIndex): bool
    {
        //TODO: fix this
        return false;
    }
}
