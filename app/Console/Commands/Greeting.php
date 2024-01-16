<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Greeting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'greet:user {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Greeting User';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('username');
        $this->info("Hello, $name!");
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if ( ! $input->getArgument('username')) {
            $input->setArgument('username', $this->ask('Name ?'));
        }
    }
}
