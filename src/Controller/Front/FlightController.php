<?php

namespace App\Controller\Front;

use App\Form\FlightType;
use App\Service\ServiceApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/front/flight', name: 'front_flight_')]
class FlightController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ServiceApi $serviceApi): Response
    {
        $destination = $serviceApi->getFlights();
        return $this->render('front/flight/index.html.twig',   ['flight' => $destination]);
    }


    #[Route('/search', name: 'search')]
public function search(Request $request): Response
{
    $form = $this->createForm(FlightType::class);
    $form->handleRequest($request);
    
    // Gérer la recherche simple depuis la barre de recherche
    $query = $request->query->get('query');
    if ($query) {
        // Simulez la récupération des résultats de recherche basée sur la requête simple
        $flights = [
            (object)[
                'id' => 1,
                'departureCity' => 'Paris',
                'arrivalCity' => $query, // Utilise la requête comme ville d'arrivée pour l'exemple
                'departureDate' => new \DateTime('2024-08-10 08:00'),
                'arrivalDate' => new \DateTime('2024-08-10 16:00'),
                'price' => 500,
            ],
            // Ajoutez d'autres vols fictifs si nécessaire
        ];

        return $this->render('front/flight/index.html.twig', [
            'flights' => $flights,
            'query' => $query,
        ]);
    }

    if ($form->isSubmitted() && $form->isValid()) {
        // Votre logique existante pour le traitement du formulaire complet
        $flights = [
            (object)[
                'id' => 1,
                'departureCity' => 'Paris',
                'arrivalCity' => 'New York',
                'departureDate' => new \DateTime('2024-08-10 08:00'),
                'arrivalDate' => new \DateTime('2024-08-10 16:00'),
                'price' => 500,
            ],
            // Ajoutez d'autres vols fictifs si nécessaire
        ];

        return $this->render('front/flight/search_results.html.twig', [
            'flights' => $flights,
        ]);
    }

    return $this->render('front/flight/search.html.twig', ['flightForm' => $form->createView()]);
}

    
}


