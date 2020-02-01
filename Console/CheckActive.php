<?php

namespace Chandu\M2Concepts\Console;

use Magento\Framework\Module\ModuleListInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckActive extends Command
{
    /**
     * @var ModuleListInterface
     */
    private $moduleList;

    /**
     * CheckActive constructor.
     * @param ModuleListInterface $moduleList
     * @param string $name
     */
    public function __construct(
        ModuleListInterface $moduleList,
        string $name = null
    )
    {
        parent::__construct($name);
        $this->moduleList = $moduleList;
    }

    /**
     * setting console command
     */
    protected function configure()
    {
        $this->setName('check:active')
            ->setDescription('Chandu M2Concepts to get List of Active Modules');

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->moduleList->getNames());
    }
}
