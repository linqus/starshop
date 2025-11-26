<?php

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    private $starships; 

    public function __construct(private LoggerInterface $mylogger) 
    {
        $this->starships = [
            new Starship(1, 'USS LeafyCruiser (NCC-0001)', 'Garden', 'Jean-Luc Pickles', 'taken over by Q'),
            new Starship(2, 'USS Espresso (NCC-1234-C)', 'Latte', 'James T. Quick!', 'repaired',),
            new Starship(3, 'USS Wanderlust (NCC-2024-W)', 'Delta Tourist', 'Kathryn Journeyway', 'under construction'),
        ];
        // In a real application, you might inject a database connection or entity manager here.
    }

    public function findAll(): array
    {
        // This is a stub. In a real application, this method would fetch data from a database.
       
        $this->mylogger->info('Starship collection retrieved');
        return $this->starships;
    }

    public function find(int $id): ?Starship
    {
        // This is a stub. In a real application, this method would fetch data from a database.
        foreach ($this->starships as $starship) {
            if ($starship->getId() === $id) {
                $this->mylogger->info('Starship with ID ' . $id . ' retrieved');
                return $starship;
            }
        }
        $this->mylogger->warning('Starship with ID ' . $id . ' not found');
        return null;

        
    }

}