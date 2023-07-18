<?php

namespace Kdg\tests;

use Kdg\DnsExtractor\DnsExtractor;
use Orchestra\Testbench\TestCase;
use Kdg\DnsExtractor\Providers\DnsExtractorProvider;

class DnsExtractorTest extends TestCase
{
    const TEST_HOSTNAME = 'google.com';

    public function testGetDnsRecordsRoute()
    {
        $response = $this->get('dns_extract/' . self::TEST_HOSTNAME);
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                [
                    'type',
                    'name',
                    'ttl',
                    'data',
                ]
            ]
        );
    }

    public function testGetDnsRecords()
    {
        $dnsExtractor = new DnsExtractor();
        $records = $dnsExtractor->getDnsRecords(self::TEST_HOSTNAME);
        $this->assertArrayHasKey('type', $records[0]);
        $this->assertArrayHasKey('name', $records[0]);
        $this->assertArrayHasKey('ttl', $records[0]);
        $this->assertArrayHasKey('data', $records[0]);
    }

    protected function getPackageProviders($app): array
    {
        return [
            DnsExtractorProvider::class,
        ];
    }
}
