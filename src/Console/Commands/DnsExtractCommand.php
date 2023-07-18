<?php

namespace Kdg\DnsExtractor\Console\Commands;

use Illuminate\Console\Command;
use Kdg\DnsExtractor\DnsExtractor;

class DnsExtractCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dns:extract {hostname}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns all dns records for specified hostname.';

    /**
     * Execute the console command.
     */
    public function handle(DnsExtractor $dnsExtractorService)
    {
        $hostname = $this->argument('hostname');
        $output = $dnsExtractorService->getDnsRecords($hostname);

        // do something with output below
        dd($output);
    }
}
