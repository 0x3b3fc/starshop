<?php

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function findAll(): array
    {
        $this->logger->info('Fetching starships from the database');

        return [
            new Starship(
                1,
                'Millennium Falcon',
                'YT-1300 light freighter',
                'Han Solo',
                'active',
            ),
            new Starship(
                2,
                'X-wing',
                'T-65 X-wing starfighter',
                'Luke Skywalker',
                'active',
            ),
            new Starship(
                3,
                'Star Destroyer',
                'Imperial I-class Star Destroyer',
                'Darth Vader',
                'active',
            ),
            new Starship(
                4,
                'Slave 1',
                'Firespray-31-class patrol and attack',
                'Boba Fett',
                'active',
            ),
        ];
    }

    public function find($id): ?Starship
    {
        // Find a starship by its ID
        foreach ($this->findAll() as $starship) {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }

        return null;
    }
}
