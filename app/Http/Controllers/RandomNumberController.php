<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomNumberController extends Controller
{
    public function showRandomNumber()
    {
        $firstTwoDigits = '54';
        $randomNumber = $firstTwoDigits . random_int(1000, 9999);

        return view('random-number', ['randomNumber' => $randomNumber]);
    }

    public function generateRandomNumber(Request $request)
    {
        $firstTwoDigits = '54';
        $randomNumber = $firstTwoDigits . random_int(1000, 9999);

        return response()->json(['randomNumber' => $randomNumber]);
    }
}
