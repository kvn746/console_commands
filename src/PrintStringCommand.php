<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class PrintStringCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('print_string')
            ->setDescription('print string several times')
            ->addArgument(
                'string',
                InputArgument::REQUIRED,
                'Please input string?'
            )
            ->addOption(
                'times',
                null,
                InputOption::VALUE_OPTIONAL,
                'How many times print string?',
                2
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $string = $input->getArgument('string');
        $times = (int) $input->getOption('times');
        if(! $times) {
            $times = 2;
        }

        for($i = 0; $i < $times; $i++) {
            $output->writeln($string);
        }

        return Command::SUCCESS;
    }
}