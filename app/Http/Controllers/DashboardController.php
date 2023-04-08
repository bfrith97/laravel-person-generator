<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\PersonStorageService;

class DashboardController extends Controller
{
    public function index(PersonStorageService $personStorageService)
    {
        //Get data from personator
        $client = new Client();
        $data = $client->get('http://personator.nmxldev.com');

        //Change JSON information to PHP array
        $personDetails = json_decode($data->getBody(), true);

        //If the API does not give a response, show an error message.
        if (!isset($personDetails['data']))
        {
            return view('pages/dashboard')->with(['api_error' => 'There was an error fetching data from the API. Please try again.']);
        }

        //Send data to storage service in order to keep controller lean.
        $personStorageService->storePerson($personDetails['data']);

        //Return the view with personDetails in order to display the generated information.
        return view('pages/dashboard')->with($personDetails['data']);

    }
}
