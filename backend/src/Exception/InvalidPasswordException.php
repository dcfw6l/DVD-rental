<?php

declare(strict_types=1);

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\HttpException;

class InvalidPasswordException extends HttpException
{
    public function __construct()
    {
        parent::__construct(400, "Invalid password");
    }
}