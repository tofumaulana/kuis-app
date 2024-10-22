<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Models\Question;


class ResultController extends Controller
{
    public function index()
    {
        $results = Result::all();

        return view('client.index', compact('results'));
    }

    // public function show($result_id){
    //     $result = Result::whereHas('user', function ($query) {
    //         $query->whereId(auth()->id());
    //     })->findOrFail($result_id);

    //     return view('client.results', compact('result'));
    // }

    public function show(Result $result, $id)
    {
        $result = Result::findOrFail($id);
    
        return view('client.results', compact('result'));
    }
}
