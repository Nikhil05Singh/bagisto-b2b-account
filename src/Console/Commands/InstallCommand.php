<?php
namespace Acme\B2BAccount\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'b2b-account:install';
    protected $description = 'Install the B2B Account module';

    public function handle()
    {
        $this->info('Running database migrations...');
        $this->call('migrate');
        $this->info('Optimizing application...');
        $this->call('optimize:clear');
        $this->info('Module installed successfully.');
    }
}