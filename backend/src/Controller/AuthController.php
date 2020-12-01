<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use RuntimeException;
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

    public function createToken(Request $request): Response
    {
        $user = $this->userRepository->findByEmail($request->getUser());

        if (!$user) {
            throw new RuntimeException('');
        }

        $isValid = $this->passwordEncoder->isPasswordValid($user, $request->getPassword());

        if (!$isValid) {
            throw new RuntimeException('');
        }

        $token = $this->jwtEncoder->encode([
            'email' => $user->getEmail(),
            'expiry' => time() + 3600
        ]);

        return new JsonResponse([
            'token' => $token
        ]);
    }
}