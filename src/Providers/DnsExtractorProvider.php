<?php

namespace Kdg\DnsExtractor\Providers;

use Illuminate\Support\ServiceProvider;
use Kdg\DnsExtractor\Console\Commands\DnsExtractCommand;

class DnsExtractorProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->commands([
            DnsExtractCommand::class,
        ]);
    }
}
