<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SayHelloCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('say_hello')
            ->setDescription('say hello argument')
            ->addArgument(
                'string',
                InputArgument::REQUIRED,
                'Please input string?'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $string = "Привет мой любимый " . $input->getArgument('string');

        $output->writeln($string);

        return Command::SUCCESS;
    }
}