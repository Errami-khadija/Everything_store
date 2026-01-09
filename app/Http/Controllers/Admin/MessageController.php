<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
     public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('admin.sections.messages.index', compact('messages'));
    }

     public function show(Message $message)
    {
       if (! $message->is_read) {
    $message->forceFill(['is_read' => true])->save();
}
        return view('admin.sections.messages.show', compact('message'));
    }




    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('success', 'Message deleted successfully');
    }
}
