<?php

namespace App\Http\Controllers\pastry;

use App\Http\Controllers\Controller;
use App\Models\pastry\Pastry;
use Illuminate\Http\Request;

class PastryApiController extends Controller
{
    

    public function getAllActivePastries() 
    {
        return response(Pastry::all(), 200, []);
    }
}
