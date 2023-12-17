<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculeController extends Controller
{
    public function calculate(){
        $num_1 = 12;
        $num_2 =  10;
        $result = $num_1 + $num_2;
        return view('welcome');
    }
    
    
}
