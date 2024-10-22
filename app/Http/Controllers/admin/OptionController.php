<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\OptionRequest;
use App\Models\Question;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::all();

        return view('admin.options.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.options.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionRequest $request)
    {
        Option::create($request->validated());

        return redirect()->route('admin.options.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $option = Option::findOrFail($id);
        return view('admin.options.show', compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $option = Option::findOrFail($id);
        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.options.edit', compact('option', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionRequest $request, string $id)
    {
        $option = Option::findOrFail($id);
        $option->update($request->validated());

        return redirect()->route('admin.options.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $option = Option::findOrFail($id);
        $option->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
