<?php declare(strict_types=1);

namespace App\Service;

use Psr\Cache\CacheItemInterface;

class MixRepository
{
    public function findAll(): array
    {
        return $cache->get('mixes_data', function(CacheItemInterface $cacheItem) use ($httpClient){
            $cacheItem->expiresAfter(5);
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/SymfonyCasts/vinyl-mixes/main/mixes.json');

            return $response->toArray();
        });
    }
}