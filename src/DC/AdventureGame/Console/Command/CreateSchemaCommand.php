<?php

namespace DC\AdventureGame\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateSchemaCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('schema:create')
            ->setDescription('Creates the database schema')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Ok');
    }
}