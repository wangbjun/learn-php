<?php

namespace Acme;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use GuzzleHttp\ClientInterface;

/**
 * 模仿laravel的命令行程序
 * Class NewCommand
 * @package Acme
 */
class NewCommand extends Command
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    public function configure()
    {
        $this->setName('new')
             ->setDescription('Create a new Laravel application.')
             ->addArgument('name', InputArgument::REQUIRED, 'Application Name');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        //asset that the folder doesn't already exist
        $directory = getcwd().'/'.$input->getArgument('name');

        $output->writeln("<info>Crafting application...</info>");

        $this->assertApplicationDoesNotExist($directory, $output);

        //download nightly version of Laravel
        //extract the zip file
        $this->download($zipFile = $this->makeFileName())
             ->extract($zipFile, $directory)
             ->cleanUp($zipFile);

        //alert the user that they are ready to go
        $output->writeln("<comment>Application created success!</comment>");
    }


    private function makeFileName()
    {
        return getcwd().'/laravel_'.md5(time().uniqid()).'.zip';
    }

    private function assertApplicationDoesNotExist($directory, OutputInterface $output)
    {
        if (is_dir($directory)) {
            $output->writeln("<error>Application already exist</error>");
            exit(1);
        }
    }

    private function download($zipFile)
    {
        $response = $this->client->get('http://cabinet.laravel.com/latest.zip')->getBody();

        file_put_contents($zipFile, $response);

        return $this;
    }

    private function extract($zipFile, $directory)
    {
        $archive = new \ZipArchive();

        $archive->open($zipFile);

        $archive->extractTo($directory);

        $archive->close();

        return $this;
    }

    private function cleanUp($zipFile)
    {
        @chmod($zipFile, 0777);
        @unlink($zipFile);

        return $this;
    }
}
