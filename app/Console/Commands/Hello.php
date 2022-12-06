<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'say:hello {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return hello, attempt a name for argument';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        if(!$name) {
            $name = $this->ask('What is your name ?');
        }
        $this->info('Bonjour '.$name.' !');
        return Command::SUCCESS;
    }
}
