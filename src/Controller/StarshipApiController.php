<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    private StarshipRepository $starshipRepository;

    public function __construct(StarshipRepository $starshipRepository)
    {
        // Inject the StarshipRepository into the controller
        $this->starshipRepository = $starshipRepository;
    }

    #[Route('', methods: ['GET'])]
    public function getCollection(): Response
    {
        // Fetch all starships from the database
        return $this->json($this->starshipRepository->findAll());
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id): Response
    {
        // Find a starship by its ID
        $starship = $this->starshipRepository->find($id);
        if (!$starship) {
            throw $this->createNotFoundException('The starship does not exist');
        }
        return $this->json($starship);
    }
}
