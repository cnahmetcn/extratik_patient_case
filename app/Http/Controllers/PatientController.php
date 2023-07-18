<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {

        $jsonFile = public_path() . "/assets/patient.json";
        $jsonDataString = file_get_contents($jsonFile);

        $data['jsonData'] = json_decode($jsonDataString, true);

        return view('index', $data);

    }
}
