<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at')->get();
        return view('chat', compact('messages'));
    }

    public function chat(Request $request)
{
    $request->validate([
        'message' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $message = $request->input('message');
    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('chat_images', 'public');
    }

    // Save user message
    Message::create(['role' => 'user', 'content' => $message, 'image_path' => $imagePath]);

    // Prepare messages array for OpenAI
    $messagesForOpenAI = [
        ['role' => 'system', 'content' => 'You are a helpful assistant.'],
        ['role' => 'user', 'content' => $message],
    ];

    // Call OpenAI
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . config('services.openai.key'),
        'Content-Type' => 'application/json',
    ])->post('https://api.openai.com/v1/chat/completions', [
        'model' => 'gpt-3.5-turbo',
        'messages' => $messagesForOpenAI,
    ]);

     if ($response->failed()) {
            $status = $response->status();
            $body = json_decode($response->body(), true);

            if ($status === 429 && isset($body['error']['code']) && $body['error']['code'] === 'insufficient_quota') {
                $reply = 'Hello, i am your DocZone AI assistant.Please how can i help you today. If you could kindly explain your symptoms to me i couuld give you directives, to you feel better again😍.';
            } else {
                $reply = 'Error contacting OpenAI API.';
            }

            \Log::error('OpenAI API request failed', [
                'status' => $status,
                'body' => $response->body(),
            ]);

            return response()->json(['reply' => $reply], 500);
        }


    $reply = $response->json('choices.0.message.content') ?? 'Sorry, I could not respond.';

    // Save assistant reply
    Message::create(['role' => 'assistant', 'content' => $reply]);

    return response()->json(['reply' => $reply]);
}

}
