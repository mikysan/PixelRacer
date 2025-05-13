<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class TrackTest extends ApiTestCase
{
    public function testCreateTrack(): void
    {
        static::createClient()->request('POST', '/tracks', [
            'json' => [
                'name' => 'Monaco Circuit',
                'trackPieces' => ['Start', 'Turn 1', 'Straight', 'Finish'],
            ],
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Track',
            '@type' => 'Track',
            'name' => 'Monaco Circuit',
            'trackPieces' => ['Start', 'Turn 1', 'Straight', 'Finish'],
        ]);
    }
}