<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Town;
use Illuminate\Http\Request;

class TownsController extends Controller
{
    public function show($search){


        $results = Town::where('name','like','%'.$search.'%')->limit(4)->get();


        return response(compact('results'));
    }
}
