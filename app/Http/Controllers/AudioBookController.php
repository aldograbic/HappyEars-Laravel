<?php

namespace App\Http\Controllers;

use App\Models\Audio_book;
use Illuminate\Http\Request;
use App\Services\OpenAI;
use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;
use Illuminate\Support\Facades\Storage;

class AudioBookController extends Controller
{
    public function index()
    {
        $audio_books = Audio_book::all();
        return view('audio_books.index', compact('audio_books'));
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

        $textToSpeech = new TextToSpeechClient([
            'credentials' => base_path('resources\aerial-bonfire-379317-8942715640d6.json')
        ]);
        $synthesisInput = (new SynthesisInput())->setText($text);
        $voice = (new VoiceSelectionParams())
            ->setLanguageCode('en-US')
            ->setName('en-US-Neural2-E')
            ->setSsmlGender(SsmlVoiceGender::FEMALE);
        $audioConfig = (new AudioConfig())
            ->setAudioEncoding(AudioEncoding::MP3);
        $response = $textToSpeech->synthesizeSpeech($synthesisInput, $voice, $audioConfig);
        $audioContent = $response->getAudioContent();

        $filename = uniqid() . '.mp3';
        Storage::disk('public')->put('audio/' . $filename, $audioContent);
        $title = 'Story of ' . $input;
        $path = 'audio/' . $filename;
        $created_by = auth()->user()->username;
        $audioBook = Audio_book::create(['title' => $title, 'text' => $text, 'audio' => $path, 'created_by' => $created_by]);

        return redirect()->route('audiobooks-page');
    }

    public function show(Audio_book $story)
    {
        return view('audio_books.story', compact('story'));
    }
}
