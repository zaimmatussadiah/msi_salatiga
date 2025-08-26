<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.message', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        return redirect()->route('message')->with(['message' => 'Pesan berhasil dikirim']);
    }

    public function reset()
    {
        Message::truncate();
        return redirect()->route('messages')->with('message', 'Semua pesan berhasil dihapus');
    }

    public function destroy(Message $message)
    {
        // dd($message);
        $message->delete();
        return redirect()->route('messages')->with('message', 'pesan berhasil dihapus');
    }
}
