<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Movie;
use App\Entity\Rental;
use App\Entity\User;
use App\Repository\MovieRepository;
use App\Repository\RentalRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use RuntimeException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class RentalController
{
    /** @var MovieRepository */
    private $movieRepository;

    /** @var RentalRepository */
    private $rentalRepository;

    /** @var TokenStorageInterface */
    private $tokenStorage;

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(
        MovieRepository $movieRepository,
        RentalRepository $rentalRepository,
        TokenStorageInterface $tokenStorage,
        EntityManagerInterface $entityManager
    ) {
        $this->movieRepository = $movieRepository;
        $this->rentalRepository = $rentalRepository;
        $this->tokenStorage = $tokenStorage;
        $this->entityManager = $entityManager;
    }

    public function index(): Response
    {
        $rentals = $this->rentalRepository->findAll();
        $response = array_map(static function (Rental $rental) {
            return [
                'id' => $rental->getId(),
                'user' => [
                    'id' => $rental->getUser()->getId(),
                    'name' => $rental->getUser()->getName()
                ],
                'expiry' => $rental->getExpiryFormatted()
            ];
        }, $rentals);

        return new JsonResponse($response);
    }

    public function rent($movie): Response
    {
        /** @var Movie $movie */
        $movie = $this->movieRepository->find((int) $movie);

        $rental = new Rental();
        $rental->setUser($this->tokenStorage->getToken()->getUser());
        $rental->setMovie($movie);
        $rental->setRentedAt(new DateTime());
        $rental->setExpiredAt(new DateTime('+1 week'));

        $this->entityManager->persist($rental);
        $this->entityManager->flush();

        return new JsonResponse([
            'id' => $rental->getId(),
            'expiry' => $rental->getExpiryFormatted()
        ]);
    }

    public function renew($rental): Response
    {
        /** @var Rental $rental */
        $rental = $this->rentalRepository->find($rental);

        /** @var User $user */
        $user = $this->tokenStorage->getToken()->getUser();

        if ($user->getId() !== $rental->getUser()->getId()) {
            throw new RuntimeException('Cannot renew someone else\'s rental');
        }

        $rental->setExpiredAt(new DateTime('+1 week'));

        $this->entityManager->flush();

        return new JsonResponse([
            'id' => $rental->getId(),
            'expiry' => $rental->getExpiryFormatted()
        ]);
    }

    public function statisticsByMovie(): Response
    {
        /** @var array|Rental[] $rentals */
        $rentals = $this->rentalRepository->findAll();
        $rentalCountsById = [];

        foreach ($rentals as $rental) {
            $movieId = $rental->getMovie()->getId();

            if (!array_key_exists($movieId, $rentalCountsById)) {
                $rentalCountsById[$movieId] = 0;
            }

            $rentalCountsById[$movieId]++;
        }

        return new JsonResponse($rentalCountsById);
    }

    public function statisticsWeekly(): Response
    {
        /** @var array|Rental[] $rentals */
        $rentals = $this->rentalRepository->findAll();
        $rentalsByWeek = [];

        foreach ($rentals as $rental) {
            $week = $rental->getExpiredAt()->format('Y-W');

            if (!array_key_exists($week, $rentalsByWeek)) {
                $rentalsByWeek[$week] = [];
            }

            if (!array_key_exists($rental->getMovie()->getId(), $rentalsByWeek[$week])) {
                $rentalsByWeek[$week][$rental->getMovie()->getId()] = 0;
            }

            $rentalsByWeek[$week][$rental->getMovie()->getId()]++;
        }

        return new JsonResponse($rentalsByWeek);
    }
}