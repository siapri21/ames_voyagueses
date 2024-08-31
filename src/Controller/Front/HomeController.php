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

        
       
        return $this->render('front/home/index.html.twig',
      
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
