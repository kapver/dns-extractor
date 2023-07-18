<?php

namespace Kdg\DnsExtractor\Controllers;

use Illuminate\Http\JsonResponse;
use Kdg\DnsExtractor\DnsExtractor;

class DnsExtractorController
{
    public function __invoke(string $hostname, DnsExtractor $dnsExtractor): JsonResponse
    {
        return response()->json($dnsExtractor->getDnsRecords($hostname));
    }
}
