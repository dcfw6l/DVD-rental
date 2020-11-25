<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Entity\Rental;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use RuntimeException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AppFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface */
    private $encoder;

    /** @var HttpClientInterface */
    private $client;

    public function __construct(
        UserPasswordEncoderInterface $encoder,
        HttpClientInterface $client
    ) {
        $this->encoder = $encoder;
        $this->client = $client;
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('admin@bme.hu');
        $password = $this->encoder->encodePassword($admin, 'password');
        $admin->setPassword($password);
        $admin->setName('Ad Min');
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $encoder = $this->encoder;

        $users = array_map(static function (int $id) use ($encoder) {
            $user = new User();
            $user->setEmail('user' . $id . '@bme.hu');
            $password = $encoder->encodePassword($user, 'password' . $id);
            $user->setPassword($password);
            $user->setName('Us Er' . $id);
            $user->setRoles(['ROLE_USER']);

            return $user;
        }, range(1, 10));

        foreach ($users as $user) {
            $manager->persist($user);
        }

        $response = $this->client->request('GET', 'https://raw.githubusercontent.com/erik-sytnyk/movies-list/master/db.json');

        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException('Movie request failed');
        }

        $responseObject = json_decode($response->getContent(), true);

        $movies = array_map(static function (array $data) {
            $movie = new Movie();
            $movie->setName($data['title']);
            $movie->setYear((int) $data['year']);
            $movie->setDirector($data['director'] ?? '');
            $movie->setActors(explode(', ', $data['actors'] ?? ''));
            $movie->setPlot($data['plot'] ?? '');
            $movie->setPosterUrl($data['posterUrl'] ?? '');

            return $movie;
        }, $responseObject['movies']);

        foreach ($movies as $movie) {
            $manager->persist($movie);
        }

        $userCount = count($users);
        $movieCount = count($movies);

        foreach (range(1, 200) as $index) {
            $rental = new Rental();
            $rental->setUser($users[rand(0, $userCount - 1)]);
            $rental->setMovie($movies[rand(0, $movieCount - 1)]);

            $daysAgo = rand(1, 30);
            $rental->setRentedAt(new DateTime('-' . $daysAgo . ' day'));
            $expiry = $daysAgo + 7;

            $rental->setExpiredAt(new DateTime(($expiry > 0 ? '+' : '') . $expiry . ' day'));
            $manager->persist($rental);
        }

        $manager->flush();
    }
}
