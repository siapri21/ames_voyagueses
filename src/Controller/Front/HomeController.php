<?php
namespace App\Controller\Front;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class HomeController extends AbstractController
{
    // private $aviationService;

    // public function __construct(ServiceApi $aviationService)
    // {
    //     $this->aviationService = $aviationService;
    // }

    
    #[Route('/', name:'home_index')]
    public function index(): Response
    {

        $carouselData = [
            [
                'image' => 'img/slide1 1.png',
                'text' => "Si tu veux faire quelque chose, ou tu trouves un moyen ou tu trouves des excuses",
                'alt' => "Slide 1"
            ],
            [
               'image' => 'img/slide1 1.png',
                'text' => "Change ta vie aujourd'hui. Ne parie pas sur le futur, agis maintenant, sur-le-champ.",
                'author' => "Simone de Beauvoir",
                'alt' => "Slide 2"
            ],
            [
                'image' => 'img/slide3 1.png',
                'text' => "La sueur d'aujourd'hui est le succès de demain.",
                'alt' => "Slide 3"
            ]
        ];

        
       
        return $this->render('front/home/index.html.twig',
        ['carouselData' => $carouselData,]
       );
       

        

       

    }

//     public function listFlights(): Response
//     {
//         $flights = $this->aviationService->getFlights();

//         return $this->render('front/flights.html.twig', [
//             'flights' => $flights,
//         ]);
// }

}
