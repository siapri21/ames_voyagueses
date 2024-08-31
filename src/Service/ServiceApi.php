<?php
// src/Service/AviationStackService.php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ServiceApi
{
    private $client;
    
    /**
     * Constructeur du service AviationStack.
     * 
     * @param HttpClientInterface $client Le client HTTP de Symfony
     * @param string $apiKey La clé API pour AviationStack
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
        
    }

    /**
     * Récupère les données de vols depuis l'API AviationStack.
     * 
     * @param array $params Paramètres optionnels pour la requête API
     * @return array Les données de vols retournées par l'API
     */
    public function getFlights(array $params = [])
    {
        $response = $this->client->request('GET', 'https://freetestapi.com/api/v1/destinations', [
            'query' => array_merge($params)
        ]);

        return $response->toArray();
    }
}