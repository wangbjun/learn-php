<?php
namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command
{
    protected function configure()
    {
        $this->setName('add')
             ->setDescription('Add a Task')
             ->addArgument('name', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');

        $this->database->query(
            'insert into label(name) values(:name)',
            compact('name')
        );

        $output->writeln("<info>Task add success!</info>");

        $this->showTasks($output);
    }
}
