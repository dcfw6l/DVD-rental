<?php

declare(strict_types=1);

namespace App\Controller;

use App\Exception\InvalidPasswordException;
use App\Exception\UserNotFoundException;
use App\Repository\UserRepository;
use DateTime;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTEncodeFailureException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController
{
    /** @var UserRepository */
    private $userRepository;

    /** @var UserPasswordEncoderInterface */
    private $passwordEncoder;

    /** @var JWTEncoderInterface */
    private $jwtEncoder;

    public function __construct(
        UserRepository $userRepository,
        UserPasswordEncoderInterface $passwordEncoder,
        JWTEncoderInterface $jwtEncoder
    ) {
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
        $this->jwtEncoder = $jwtEncoder;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws JWTEncodeFailureException|UserNotFoundException
     * @throws InvalidPasswordException
     */
    public function createToken(Request $request): Response
    {
        $user = $this->userRepository->findByEmail($request->getUser());

        if (!$user) {
            throw new UserNotFoundException();
        }

        $isValid = $this->passwordEncoder->isPasswordValid($user, $request->getPassword());

        if (!$isValid) {
            throw new InvalidPasswordException();
        }

        $token = $this->jwtEncoder->encode([
            'email' => $user->getEmail(),
            'expiry' => new DateTime('+ 1 hour')
        ]);

        return new JsonResponse([
            'token' => $token
        ]);
    }
}