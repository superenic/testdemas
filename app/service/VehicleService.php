<?php
namespace App\service;

use GuzzleHttp\Client;

class VehicleService {
    private $cliente;

    /**
     * @param string $url
     * @return ResponseInterface
     */
    public function getResponse($url)
    {
        $urlRequest = $url;
        $client = new Client();

        return $client->request('GET', $urlRequest);
    }

    public function decodeVIN()
    {
        /** @var ResponseInterface $response */
        $response = $this->getResponse(
            "https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/5UXWX7C5*BA?format=json&modelyear=2011"
        );
        $object = json_decode($response->getBody());

        return $object;
    }
}
