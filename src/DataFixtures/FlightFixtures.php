<?php

namespace App\DataFixtures;

use App\Entity\Flight;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FlightFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create('fr_FR');
        $this->faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($this->faker));
    }
    
    public function load(ObjectManager $manager): void
    {


      for ($i = 0; $i < 10; $i++) {
        $flight = new Flight();
        $flight->setDeparture($this->faker->city());
        $flight->setDestination($this->faker->city());
        $flight->setDepartureTime($this->faker->dateTime());
        $flight->setArrivalTime($this->faker->dateTime());
        $flight->setPrice($this->faker->randomFloat(200, 1000));
        $flight->setFlightNumber($this->faker->randomNumber(3));
        $flight->setAirline($this->faker->company());
        $flight->setAvailablesSeats($this->faker->randomNumber(2));
        $flight->setDuration($this->faker->dateTimeInInterval());
        $flight->setStatus($this->faker->randomElement(['En attente', 'à heure', 'retardé', 'en cours','annulé']));
        $flight->setPersonnNumber($this->faker->numerify());
        $flight->setClassFlight($this->faker->randomElement(['Economy', 'Business']));

        $manager->persist($flight);
      }
        $manager->flush();
    }
}
