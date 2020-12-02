<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MovieController
{
    /** @var MovieRepository */
    private $movieRepository;

    public function __construct(
        MovieRepository $movieRepository
    ) {
        $this->movieRepository = $movieRepository;
    }

    public function index(): Response
    {
        /** @var array|Movie[] $movies */
        $movies = $this->movieRepository->findAll();

        $response = array_map(static function (Movie $movie) {
            return [
                'id' => $movie->getId(),
                'name' => $movie->getName(),
                'year' => $movie->getYear(),
                'director' => $movie->getDirector(),
                'actors' => $movie->getActors(),
                'plot' => $movie->getPlot(),
                'posterUrl' => $movie->getPosterUrl()
            ];
        }, $movies);

        return new JsonResponse($response);
    }
}