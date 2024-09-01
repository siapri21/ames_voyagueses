<?php

namespace App\Controller\Front;

use App\Service\ServiceApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/front/flight', name: 'front_flight_')]
class FlightController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ServiceApi $serviceApi): Response
    {
        // Récupération des destinations depuis l'API
        $destination = $serviceApi->getFlights();

        // Rendu du template avec les destinations
        return $this->render('front/flight/index.html.twig', [
            'flight' => $destination,  // Passe la variable 'flight' au template
        ]);
    }

    #[Route('/search', name: 'search')]
    public function search(Request $request): Response
    {
        // Récupération de la requête utilisateur
        $query = $request->query->get('query');
        
        $flights = [];

        if ($query) {
            // Simuler des résultats de recherche basés sur la requête
            $flights = [
                (object)[
                    'id' => 1,
                    'departureCity' => 'Paris',
                    'arrivalCity' => $query,  // Utilisation de la requête comme ville d'arrivée
                    'departureDate' => new \DateTime('2024-08-10 08:00'),
                    'arrivalDate' => new \DateTime('2024-08-10 16:00'),
                    'price' => 500,
                    'airline' => 'Air France',
                ],
                // Ajoutez d'autres vols fictifs ici si nécessaire
            ];
        } else {
            // Si aucune requête n'est spécifiée, renvoyez simplement une liste vide
            $flights = [];
        }

        // Rendu du template avec les résultats de recherche
        return $this->render('front/flight/search_results.html.twig', [
            'flights' => $flights,  // Passe la variable 'flights' au template
            'query' => $query,
        ]);

        dump($flights);
    }
}
