<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class RandomCommand extends Command
{
    protected function configure()
    {
        $this->setName('random')
             ->setDescription('Stampa un numero casuale');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(rand(0,100));
    }
}