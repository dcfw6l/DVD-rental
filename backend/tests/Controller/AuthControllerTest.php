<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class AuthControllerTest extends WebTestCase
{
    /** @var KernelBrowser */
    private $client;

    protected function setUp()
    {
        parent::setUp();

        $this->client = self::createClient();
        $this->client->catchExceptions(false);
        $this->client->followRedirects(true);
        $this->client->followMetaRefresh(true);
    }

    protected function tearDown(): void
    {
        $this->client = null;

        parent::tearDown();
    }

    public function testGetMethodLogin(): void
    {
        $this->expectException(MethodNotAllowedHttpException::class);

        $this->client->xmlHttpRequest('GET', '/api/login_check');

        self::assertEquals(405, $this->client->getResponse()->getStatusCode());
    }

    public function testLoginWithEmptyRequest(): void
    {
        $this->expectException(BadRequestHttpException::class);

        $this->client->xmlHttpRequest(
            'POST',
            '/api/login_check',
            [],
            [],
            [ 'CONTENT_TYPE' => 'application/json' ]
        );

        self::assertEquals(400, $this->client->getResponse()->getStatusCode());
    }

    public function testLoginWithoutCredentials(): void
    {
        $this->expectException(BadRequestHttpException::class);

        $this->client->xmlHttpRequest(
            'POST',
            '/api/login_check',
            [],
            [],
            [ 'CONTENT_TYPE' => 'application/json' ]
        );

        self::assertEquals(400, $this->client->getResponse()->getStatusCode());
    }

    public function testLoginWithUsername(): void
    {
        $this->expectException(BadRequestHttpException::class);

        $this->client->xmlHttpRequest(
            'POST',
            '/api/login_check',
            [],
            [],
            [ 'CONTENT_TYPE' => 'application/json' ],
            json_encode([
                'username' => 'user'
            ])
        );

        self::assertEquals(400, $this->client->getResponse()->getStatusCode());
    }

    public function testLoginWithPassword(): void
    {
        $this->expectException(BadRequestHttpException::class);

        $this->client->xmlHttpRequest(
            'POST',
            '/api/login_check',
            [],
            [],
            [ 'CONTENT_TYPE' => 'application/json' ],
            json_encode([
                'password' => 'password'
            ])
        );

        self::assertEquals(400, $this->client->getResponse()->getStatusCode());
    }

    public function testLoginWithUsernameAndPassword(): void
    {
        $this->client->xmlHttpRequest(
            'POST',
            '/api/login_check',
            [],
            [],
            [ 'CONTENT_TYPE' => 'application/json' ],
            json_encode([
                'username' => 'user',
                'password' => 'password'
            ])
        );

        self::assertEquals(401, $this->client->getResponse()->getStatusCode());
    }

    public function testLoginWithValidCredentials(): void
    {
        $this->client->xmlHttpRequest(
            'POST',
            '/api/login_check',
            [],
            [],
            [ 'CONTENT_TYPE' => 'application/json' ],
            json_encode([
                'username' => 'admin@bme.hu',
                'password' => 'password'
            ])
        );

        $response = $this->client->getResponse();

        self::assertEquals(200, $response->getStatusCode());

        $content = $response->getContent();

        self::assertNotNull($content);
        self::assertGreaterThan(2, strlen($content));

        $contentObject = json_decode($content, true);

        self::assertNotNull($contentObject);
        self::assertIsArray($contentObject);
        self::assertArrayHasKey('token', $contentObject);

        $token = $contentObject['token'];

        self::assertNotNull($token);
        self::assertIsString($token);
        self::assertStringStartsWith('ey', $token);
    }
}