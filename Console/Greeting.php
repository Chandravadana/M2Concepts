<?php

namespace Chandu\M2Concepts\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Greeting extends Command
{
    /**
     * setting console command
     */
    protected function configure()
    {
        $this->setName('greeting');
        $this->setDescription('Chandu M2Concepts Greetings');
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Hello");
    }
}
