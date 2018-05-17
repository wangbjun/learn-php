<?php

namespace Acme;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SayHelloCommand extends Command
{
    public function configure()
    {
        $this->setName('sayHelloTo')
            ->setDescription('This is demo for console app!')
            ->addArgument('name', InputArgument::REQUIRED, 'Your Name');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');

        $output->writeln('Hello World!' . $name);
    }
}
