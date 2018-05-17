<?php

namespace Acme;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;

class Command extends SymfonyCommand
{
    protected $database;

    public function __construct(DatabaseAdapter $database)
    {
        parent::__construct();
        $this->database = $database;
    }

    protected function showTasks($output)
    {
        $tasks = $this->database->fetchAll('label ');

        $table = new Table($output);

        $table->setHeaders(['Id', 'Name'])
            ->setRows($tasks)
            ->render();
    }
}
