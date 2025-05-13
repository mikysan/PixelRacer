<?php

namespace App\Tests\Api;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class CarTest extends ApiTestCase
{
    public function testCreateCar(): void
    {
        static::createClient()->request('POST', '/cars', [
            'json' => [
                'name' => 'Ferrari',
            ],
            'headers' => [
                'Content-Type' => 'application/ld+json',
            ],
        ]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Car',
            '@type' => 'Car',
            'name' => 'Ferrari',
        ]);
    }
}