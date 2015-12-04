<?php

namespace LeanCodeKataProject;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleApp extends Command
{
    protected function configure()
    {
        $this->setName('kata');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cashMachine = new CashMachine();

        while ($line = readline()) {
            $cashMachine->add($line);
            $output->writeln($cashMachine->total());
        }
    }
}

