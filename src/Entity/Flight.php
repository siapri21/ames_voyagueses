<?php

namespace App\Entity;

use App\Repository\FlightRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlightRepository::class)]
class Flight
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $departure = null;

    #[ORM\Column(length: 255)]
    private ?string $destination = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $departureTime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $arrivalTime = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $price = null;

    #[ORM\Column(length: 255)]
    private ?string $airline = null;

    #[ORM\Column(length: 255)]
    private ?string $flightNumber = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $duration = null;

    #[ORM\Column]
    private ?int $availablesSeats = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $personnNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $classFlight = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeparture(): ?string
    {
        return $this->departure;
    }

    public function setDeparture(string $departure): static
    {
        $this->departure = $departure;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): static
    {
        $this->destination = $destination;

        return $this;
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departureTime;
    }

    public function setDepartureTime(\DateTimeInterface $departureTime): static
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    public function getArrivalTime(): ?\DateTimeInterface
    {
        return $this->arrivalTime;
    }

    public function setArrivalTime(\DateTimeInterface $arrivalTime): static
    {
        $this->arrivalTime = $arrivalTime;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getAirline(): ?string
    {
        return $this->airline;
    }

    public function setAirline(string $airline): static
    {
        $this->airline = $airline;

        return $this;
    }

    public function getFlightNumber(): ?string
    {
        return $this->flightNumber;
    }

    public function setFlightNumber(string $flightNumber): static
    {
        $this->flightNumber = $flightNumber;

        return $this;
    }

    public function getDuration(): ?\DateTimeInterface
    {
        return $this->duration;
    }

    public function setDuration(\DateTimeInterface $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getAvailablesSeats(): ?int
    {
        return $this->availablesSeats;
    }

    public function setAvailablesSeats(int $availablesSeats): static
    {
        $this->availablesSeats = $availablesSeats;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getPersonnNumber(): ?string
    {
        return $this->personnNumber;
    }

    public function setPersonnNumber(string $personnNumber): static
    {
        $this->personnNumber = $personnNumber;

        return $this;
    }

    public function getClassFlight(): ?string
    {
        return $this->classFlight;
    }

    public function setClassFlight(string $classFlight): static
    {
        $this->classFlight = $classFlight;

        return $this;
    }
}
