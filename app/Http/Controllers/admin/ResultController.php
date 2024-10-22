<?php

namespace App\Http\Controllers\Admin;

use App\Models\Result;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ResultRequest;

class ResultController extends Controller
{
   
    public function index()
    {
        $results = Result::all();

        return view('admin.results.index', compact('results'));
    }

    public function show(Result $result, $id)
    {
        // $result = Result::whereHas('user', function ($query) {
        //     $query->whereId(auth()->id());
        // })->findOrFail($id);
        $result = Result::findOrFail($id);
    
        return view('admin.results.show', compact('result'));
        // return view('admin.results.show');
    }

    public function destroy(string $id)
    {
        $result = Result::findOrFail($id);
        $result->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    // public function massDestroy()
    // {
    //     Result::whereIn('id', request('ids'))->delete();

    //     return response()->noContent();
    // }
}
