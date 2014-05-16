<?php

namespace DC\AdventureGame\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Silex\Application;


class CreateSchemaCommand extends Command
{

    private $silex;

    public function __construct(Application $silex, $name = null)
    {
        parent::__construct($name);
        $this->silex = $silex;
    }


    protected function configure()
    {
        $this
            ->setName('schema:create')
            ->setDescription('Creates the database schema')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->silex['db']->exec('CREATE TABLE `players` (
            `name` VARCHAR(255)
            );');
        $output->writeln('Ok');
    }
}
