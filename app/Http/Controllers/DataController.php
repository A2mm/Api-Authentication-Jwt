<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function open() 
    {
        $data = "This data is open and can be accessed without the client being authenticated";
        return response()->json(compact('data'),200);

    }

    public function closed() 
    {
        $data = "done you are authorized";
        return response()->json(compact('data'),200);
    }
}
