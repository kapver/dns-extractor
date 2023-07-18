<?php

namespace Kdg\DnsExtractor;

class DnsExtractor
{
    /**
     * Getting dns records using PHP built-in function
     * Also it is possible to extend/replace results with OS built-in command like "dig"
     * or with external service like https://toolbox.googleapps.com/apps/dig/
     *
     * @param string $hostname
     * @return array
     * @throws \Exception
     */
    public function getDnsRecords(string $hostname): array
    {
        $formattedOutput = [];
        $mainKeys = ['type', 'host', 'ttl'];

        $dnsRecords = dns_get_record($hostname);

        foreach ($dnsRecords as $dnsRecord) {
            $data = array_filter($dnsRecord, function($key)use($mainKeys){
                return !in_array($key, $mainKeys);
            }, ARRAY_FILTER_USE_KEY);

            $formattedOutput[] = [
                'type' => $dnsRecord['type'],
                'name' => $dnsRecord['host'],
                'ttl'  => $dnsRecord['ttl'],
                'data' => $data, // Not sure what exact key should be placed here
            ];
        }

        return $formattedOutput;
    }
}
