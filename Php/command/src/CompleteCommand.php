<?php

namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command
{
    protected function configure()
    {
        $this->setName('complete')
            ->setDescription('complete a task by id')
            ->addArgument('id', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query(
            'delete from label where id = :id',
            compact('id')
        );

        $output->writeln("<info>Task complete success!</info>");

        $this->showTasks($output);
    }
}