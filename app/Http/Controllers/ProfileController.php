<?php

namespace App\Http\Controllers;

use App\Models\Audio_book;
use App\Models\Text_book;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->username;
        $text_books = Text_book::where('created_by', $user_id)->get();
        $audio_books = Audio_book::where('created_by', $user_id)->get();
        return view('profile', compact('text_books', 'audio_books'));
    }

    public function delete($id)
    {
        $text_story = Text_book::findOrFail($id);
        $text_story->delete();
        return redirect()->back()->with('message', 'Text story deleted successfully');
    }
}
