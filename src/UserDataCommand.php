<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class UserDataCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('user_data')
            ->setDescription('interactive user data')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $question = new Question("Введите Ваше имя: ", 'AcmeDemoBundle');
        $name = $helper->ask($input, $output, $question);

        $question = new Question("Введите Ваш возраст: ", 'AcmeDemoBundle');
        $age = $helper->ask($input, $output, $question);

        $question = new ChoiceQuestion(
            "Укажите Ваш пол",
            ["М", "Ж"],
            0
        );
        $question->setErrorMessage("Неправильное значение при выборе пола");
        $gender = $helper->ask($input, $output, $question);

        $string = "Здравствуйте, ";
        $string .= $name;
        $string .= ", Ваш возраст: ";
        $string .= (int) $age;
        $string .= ", Ваш пол: ";
        $string .= $gender;
        $output->writeln($string);

        return Command::SUCCESS;
    }
}