<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Task2Controller extends Controller
{
    public function data(): JsonResponse
    {
        $guzzleClient = new Client();

        $starshipList = [];

        try {
            $planetsResponse = $guzzleClient->get('https://swapi.dev/api/planets/?search=Kashyyyk');
            $planetsBody = $planetsResponse->getBody()->getContents();
            $planetsData = json_decode($planetsBody, true);

            // for every planet named Kashyyyk (should be only 1)
            foreach ($planetsData['results'] as $planet) {
                // for every resident of planet
                foreach ($planet['residents'] as $residentLink) {
                    $residentResponse = $guzzleClient->get($residentLink);
                    $residentBody = $residentResponse->getBody()->getContents();
                    $residentData = json_decode($residentBody, true);
                    // collect ship links for output
                    foreach ($residentData['starships'] as $starshipLink) {
                        if (!in_array($starshipLink, $starshipList)) {
                            $starshipList[] = $starshipLink;
                        }
                    }
                }
            }
        } catch (GuzzleException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }

        return response()->json($starshipList);
    }
}
