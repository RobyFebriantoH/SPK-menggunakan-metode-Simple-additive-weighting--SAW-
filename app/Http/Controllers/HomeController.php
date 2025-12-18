<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlternatifModel;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all alternatives
        $alternatives = AlternatifModel::all();

        // Pass the variables to the view
        return view('home', compact('alternatives'));
    }
}