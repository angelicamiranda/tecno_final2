<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\PersonalizeRuntime\PersonalizeRuntimeClient;

class PersonalizeController extends Controller
{
    public function getRecommendations(Request $request)
    {
        $userId = $request->input('user_id'); // Obtener el ID del usuario desde la solicitud

        $client = new PersonalizeRuntimeClient([
            'region' => config('aws.default_region'),
            'version' => 'latest',
            'credentials' => [
                'key' => config('aws.access_key_id'),
                'secret' => config('aws.secret_access_key'),
            ],
        ]);

        $response = $client->getRecommendations([
            'campaignArn' => 'your_campaign_arn',
            'itemId' => 'item_id_to_base_recommendations_on',
            'userId' => $userId,
        ]);

        // Procesar y devolver la respuesta a la vista
        $recommendations = $response->get('itemList');
        
        return view('recommendations', compact('recommendations'));
    }
}