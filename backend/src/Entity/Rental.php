<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Rental
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="rentals")
     */
    private $user;

    /**
     * @var Movie
     *
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="rentals")
     */
    private $movie;

    /**
     * @var DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    private $rentedAt;

    /**
     * @var DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     */
    private $expiredAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(Movie $movie): void
    {
        $this->movie = $movie;
    }

    public function getExpiredAt(): ?DateTimeInterface
    {
        return $this->expiredAt;
    }

    /**
     * @return DateTimeInterface
     */
    public function getRentedAt(): DateTimeInterface
    {
        return $this->rentedAt;
    }

    /**
     * @param DateTimeInterface $rentedAt
     */
    public function setRentedAt(DateTimeInterface $rentedAt): void
    {
        $this->rentedAt = $rentedAt;
    }

    public function setExpiredAt(DateTimeInterface $expiredAt): void
    {
        $this->expiredAt = $expiredAt;
    }

    public function getExpiryFormatted(): ?string
    {
        if ($this->expiredAt === null) {
            return null;
        }

        return $this->expiredAt->format('Y-m-d H:i');
    }
}