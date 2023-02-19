<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Deploy\Console\Command\App;

use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Runs the process of importing configuration data from shared source to appropriate application sources
 *
 * We have configuration files that are shared between environments, but some of the configurations are read only
 * from DB (e.g., themes, scopes and etc). This command is used to import such configurations from the file to
 * appropriate application sources
 */
class ConfigImportCommand extends Command
{
    const COMMAND_NAME = 'app:config:import';

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription('Import data from shared configuration files to appropriate data storage');

        parent::configure();
    }

    /**
     * Imports data from deployment configuration files to the DB.
     * {@inheritdoc}
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>app:config:import is removed by Memegento due to hard dependencies on store modules</info>');

        return Cli::RETURN_SUCCESS;
    }
}
