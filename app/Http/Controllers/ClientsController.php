<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    // add function for index
    public function index()
    {
        $clients = Client::all(['name', 'email', 'phone', 'address', 'city', 'state', 'zip', 'company_name', 'company_address']);
        return response()->json($clients);
    }
}
