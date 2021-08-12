<?php

namespace App\Http\Controllers\pastry;

use App\Http\Controllers\Controller;
use App\Models\pastry\Pastry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Catch_;

class PastryApiController extends Controller
{
    

    public function getAllActivePastries() 
    {
        $pastries = null;

        try {

            Log::debug("Fetching pastries");
            
            $pastries = response(Pastry::all(), 200, []);

            Log::debug(json_encode($pastries));

            Log::debug("Completed fetching pastries");
            
            return $pastries;
                
        } catch(\Exception $e) {
            Log::debug("Exception occurred");
            Log::debug("Exception message: " . $e->getMessage());
            Log::debug(json_encode($e));
        }

        return $pastries;
    }
}
