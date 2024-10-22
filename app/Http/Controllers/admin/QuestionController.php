<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\QuestionRequest;
use App\Models\Category;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();

        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');

        return view('admin.questions.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        Question::create($request->validated());

        return redirect()->route('admin.questions.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::findOrFail($id);
        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);
        $categories = Category::all()->pluck('name', 'id');

        return view('admin.questions.edit', compact('question', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, string $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->validated());

        return redirect()->route('admin.questions.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
