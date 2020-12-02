<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class RentalControllerTest extends WebTestCase
{
    protected function createGuestClient(): KernelBrowser
    {
        return self::createClient();
    }

    protected function createUserClient(): KernelBrowser
    {
        return $this->createAuthenticatedClient('user1@bme.hu', 'password1');
    }

    protected function createAdminClient(): KernelBrowser
    {
        return $this->createAuthenticatedClient('admin@bme.hu', 'password');
    }

    private function createAuthenticatedClient(string $username, string $password): KernelBrowser
    {
        $client = self::createClient();

        $client->xmlHttpRequest(
            'POST',
            '/api/login_check',
            [],
            [],
            [ 'CONTENT_TYPE' => 'application/json' ],
            json_encode([
                'username' => $username,
                'password' => $password
            ])
        );

        $data = json_decode($client->getResponse()->getContent(), true);
        $token = (string) ($data['token'] ?? '');

        $client->setServerParameter('HTTP_Authorization', 'Bearer ' . $token);

        return $client;
    }

    public function testGuestListing(): void
    {
        $client = $this->createGuestClient();

        $client->xmlHttpRequest('GET', '/api/rentals');

        self::assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function testUserListing(): void
    {
        $client = $this->createUserClient();
        $client->catchExceptions(false);

        $this->expectException(AccessDeniedException::class);

        $client->xmlHttpRequest('GET', '/api/rentals');

        self::assertEquals(403, $client->getResponse()->getStatusCode());
    }

    public function testAdminListing(): void
    {
        $client = $this->createAdminClient();

        $client->xmlHttpRequest('GET', '/api/rentals');

        $response = $client->getResponse();

        self::assertEquals(200, $response->getStatusCode());

        $content = $response->getContent();

        self::assertNotNull($content);
        self::assertIsString($content);

        $contentObject = json_decode($content, true);

        self::assertNotNull($contentObject);
        self::assertIsArray($contentObject);

        foreach ($contentObject as $rental) {
            self::assertIsArray($rental);

            self::assertArrayHasKey('id', $rental);
            self::assertNotNull($rental['id']);
            self::assertIsInt($rental['id']);
            self::assertGreaterThan(0, $rental['id']);

            self::assertArrayHasKey('user', $rental);
            self::assertNotNull($rental['user']);
            self::assertIsArray($rental['user']);
            self::assertArrayHasKey('id', $rental['user']);
            self::assertNotNull($rental['user']['id']);
            self::assertIsInt($rental['user']['id']);
            self::assertGreaterThan(0, $rental['user']['id']);
            self::assertArrayHasKey('name', $rental['user']);
            self::assertNotNull($rental['user']['name']);
            self::assertIsString($rental['user']['name']);
            self::assertGreaterThan(0, strlen($rental['user']['name']));

            self::assertArrayHasKey('expiry', $rental);
            self::assertNotNull($rental['expiry']);
            self::assertIsString($rental['expiry']);
            self::assertRegExp('/\d{4}-\d{2}-\d{2} \d{2}:\d{2}/', $rental['expiry']);
        }
    }

    public function testGuestRent(): void
    {
        $client = $this->createGuestClient();

        $client->xmlHttpRequest('POST', '/api/movies/1/rent');

        self::assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function testUserRentNotExistingMovie(): void
    {
        $client = $this->createUserClient();
        $client->catchExceptions(false);

        $this->expectException(BadRequestHttpException::class);

        $client->xmlHttpRequest('POST', '/api/movies/10000000/rent');

        self::assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testUserRentExistingMovie(): void
    {
        $client = $this->createUserClient();

        $client->xmlHttpRequest('POST', '/api/movies/1/rent');

        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testAdminRent(): void
    {
        $client = $this->createAdminClient();

        $client->xmlHttpRequest('POST', '/api/movies/1/rent');

        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }

//    public function testGuestRenew(): void
//    {
//        $client = $this->createGuestClient();
//
//        $client->xmlHttpRequest('POST', '/api/rentals/1/renew');
//
//        self::assertEquals(401, $client->getResponse()->getStatusCode());
//    }
//
//    public function testUserRenewOthers(): void
//    {
//        $client = $this->createUserClient();
//
//        $this->expectException(BadRequestHttpException::class);
//
//        $client->xmlHttpRequest('POST', '/api/rentals/1/renew');
//
//        self::assertEquals(400, $client->getResponse()->getStatusCode());
//    }
//
//    public function testUserRenewOwn(): void
//    {
//        $client = $this->createUserClient();
//
//        $client->xmlHttpRequest('POST', '/api/rentals/1/renew');
//
//        self::assertEquals(200, $client->getResponse()->getStatusCode());
//    }
//
//    public function testAdminRenewOthers(): void
//    {
//        $client = $this->createAdminClient();
//
//        $this->expectException(BadRequestHttpException::class);
//
//        $client->xmlHttpRequest('POST', '/api/rentals/1/renew');
//
//        self::assertEquals(400, $client->getResponse()->getStatusCode());
//    }
//
//    public function testAdminRenewOwn(): void
//    {
//        $client = $this->createAdminClient();
//
//        $client->xmlHttpRequest('POST', '/api/rentals/1/renew');
//
//        self::assertEquals(401, $client->getResponse()->getStatusCode());
//    }

    public function testGuestStatisticsByMovie(): void
    {
        $client = $this->createGuestClient();

        $client->xmlHttpRequest('GET', '/api/statistics/by-movie');

        self::assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function testUserStatisticsByMovie(): void
    {
        $client = $this->createUserClient();
        $client->catchExceptions(false);

        $this->expectException(AccessDeniedException::class);

        $client->xmlHttpRequest('GET', '/api/statistics/by-movie');

        self::assertEquals(403, $client->getResponse()->getStatusCode());
    }

    public function testAdminStatisticsByMovie(): void
    {
        $client = $this->createAdminClient();

        $client->xmlHttpRequest('GET', '/api/statistics/by-movie');

        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testGuestStatisticsWeekly(): void
    {
        $client = $this->createGuestClient();

        $client->xmlHttpRequest('GET', '/api/statistics/weekly');

        self::assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function testUserStatisticsWeekly(): void
    {
        $client = $this->createUserClient();
        $client->catchExceptions(false);

        $this->expectException(AccessDeniedException::class);

        $client->xmlHttpRequest('GET', '/api/statistics/weekly');

        self::assertEquals(403, $client->getResponse()->getStatusCode());
    }

    public function testAdminStatisticsWeekly(): void
    {
        $client = $this->createAdminClient();

        $client->xmlHttpRequest('GET', '/api/statistics/weekly');

        self::assertEquals(200, $client->getResponse()->getStatusCode());
    }
}