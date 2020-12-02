<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MovieControllerTest extends WebTestCase
{
    public function testListing(): void
    {
        $client = self::createClient();

        $client->xmlHttpRequest('GET', '/api/movies');

        $response = $client->getResponse();

        self::assertEquals(200, $response->getStatusCode());

        $content = $response->getContent();

        self::assertNotNull($content);
        self::assertIsString($content);

        $contentObject = json_decode($content, true);

        self::assertNotNull($contentObject);
        self::assertIsArray($contentObject);

        foreach ($contentObject as $movie) {
            self::assertIsArray($movie);

            self::assertArrayHasKey('id', $movie);
            self::assertNotNull($movie['id']);
            self::assertIsInt($movie['id']);
            self::assertGreaterThan(0, $movie['id']);

            self::assertArrayHasKey('name', $movie);
            self::assertIsString($movie['name']);
            self::assertGreaterThan(0, strlen($movie['name']));
        }
    }
}