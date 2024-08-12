<?php

namespace App\Controller\Front;

use App\Form\FlightType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/front/flight', name: 'front_flight_')]
class FlightController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('front/flight/index.html.twig', [
            'controller_name' => 'FlightController',
        ]);
    }

    #[Route('/search', name: 'search')]
    public function search( Request  $request): Response
    {
        $form = $this->createForm(FlightType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // $data = $form->getData();
            // dd($data);
               // Simulez la récupération des résultats de recherche
            // Dans une vraie application, vous interrogeriez votre base de données ici
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
            dd($flights);
        }
        return $this->render('front/flight/search.html.twig', ['flightForm'=>$form->createView()]);
    }

    
}


