<?php

namespace App\Http\Controllers;

use App\Models\Text_book;
use Illuminate\Http\Request;
use App\Services\OpenAI;

class TextBookController extends Controller
{
    public function index()
    {
        $text_books = Text_book::all();
        return view('text_books.index', compact('text_books'));
    }    

    public function store(Request $request)
    {

        $input = $request->input('prompt');
        $modifiedInput = 'Kids story about ' . $input;

        $api_key = env('OPENAI_API_KEY');
        $model = 'text-davinci-003';
        $openai = new OpenAI($api_key);
        $completions = $openai->gpt3($model, $modifiedInput, 1, 500, ['\n']);
        $text = $completions[0]['text'];
        $title = "Story of " . $input;
        $created_by = auth()->user()->username;
        $story = Text_book::create(['title' => $title, 'text' => $text, 'created_by' => $created_by]);

        return redirect()->route('textbooks-page');
    }

    public function show(Text_book $story)
    {
        return view('text_books.story', compact('story'));
    }
}
